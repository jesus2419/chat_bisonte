CREATE TABLE Subgrupo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    GrupoPrincipal_ID INT NOT NULL,
    Fecha_creacion DATETIME,
    Descripcion VARCHAR(100),
    Imagen BLOB,
    FOREIGN KEY (GrupoPrincipal_ID) REFERENCES Grupo(ID)
);

CREATE TABLE Tareas (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    SubGrupo_ID INT NOT NULL,
    Fecha_creacion DATETIME,
    Descripcion VARCHAR(255),
    Estado bool,
    FOREIGN KEY (SubGrupo_ID) REFERENCES Subgrupo(ID)
);

CREATE TABLE TareasSubGrupos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Id_Tarea INT NOT NULL,
    Id_Usuario INT NOT NULL,
    Fecha_Entregada DATETIME,
    Comentario VARCHAR(255),
    contenido LONGBLOB ,
    Entregada bool,
    FOREIGN KEY (Id_Tarea) REFERENCES Tareas(ID),
	FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(ID)
);

CREATE TABLE Insignias (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Id_Tarea INT NOT NULL,
    Id_Usuario INT NOT NULL,
    Fecha_Entregada DATETIME,
    FOREIGN KEY (Id_Tarea) REFERENCES Tareas(ID),
    FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(ID)
);


DELIMITER //
CREATE PROCEDURE InsertarTarea(
    IN p_Nombre VARCHAR(100),
    IN p_SubGrupo_ID INT,
    IN p_Descripcion VARCHAR(255),
    IN p_Estado BOOLEAN
)
BEGIN
    INSERT INTO Tareas (Nombre, SubGrupo_ID, Fecha_creacion, Descripcion, Estado)
    VALUES (p_Nombre, p_SubGrupo_ID, NOW(), p_Descripcion, p_Estado);
END //
DELIMITER ;


select * from TareasSubGrupos;
select * from tareas;
select ID ,
    Nombre ,
    SubGrupo_ID ,
    Fecha_creacion ,
    Descripcion,
    Estado  from tareas;
    
    select ID ,
    Nombre ,
    SubGrupo_ID ,
    Fecha_creacion ,
    Descripcion,
    Estado  from tareas where subgrupo_ID = 7 and Estado = 1;

DELIMITER //

CREATE PROCEDURE InsertarTareaSubGrupo(
    IN p_Id_Tarea INT,
    IN p_Id_Usuario INT,
    IN p_Comentario VARCHAR(255),
    IN p_Contenido LONGBLOB,
    IN p_Entregada BOOL
)
BEGIN
    INSERT INTO TareasSubGrupos (Id_Tarea, Id_Usuario, Fecha_Entregada, Comentario, contenido, Entregada)
    VALUES (p_Id_Tarea, p_Id_Usuario, NOW(), p_Comentario, p_Contenido, p_Entregada);
END //

DELIMITER ;



-- archivos
CREATE TABLE archivo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenido LONGBLOB NOT NULL
);
SELECT Usuarios.ID, Usuarios.Usuario, TareasSubGrupos.ID AS TareaSubGrupoID, TareasSubGrupos.Comentario
FROM Usuarios
LEFT JOIN MiembrosSubgrupo ON Usuarios.ID = MiembrosSubgrupo.UsuarioID
LEFT JOIN TareasSubGrupos ON Usuarios.ID = TareasSubGrupos.Id_Usuario AND TareasSubGrupos.Id_Tarea = 2
WHERE MiembrosSubgrupo.SubgrupoID = 7 and Usuarios.ID != 6;



 SELECT Usuarios.ID, Usuarios.Usuario, TareasSubGrupos.ID AS TareaSubGrupoID
FROM Usuarios
LEFT JOIN MiembrosSubgrupo ON Usuarios.ID = MiembrosSubgrupo.UsuarioID
LEFT JOIN TareasSubGrupos ON Usuarios.ID = TareasSubGrupos.Id_Usuario
WHERE MiembrosSubgrupo.SubgrupoID = 7;

SELECT Usuarios.ID, Usuarios.Usuario, TareasSubGrupos.ID AS TareaSubGrupoID
        FROM Usuarios
        LEFT JOIN MiembrosSubgrupo ON Usuarios.ID = MiembrosSubgrupo.UsuarioID
        LEFT JOIN TareasSubGrupos ON Usuarios.ID = TareasSubGrupos.Id_Usuario
        WHERE MiembrosSubgrupo.SubgrupoID = 7 AND TareasSubGrupos.Id_Tarea = 3;

 SELECT Usuarios.ID, Usuarios.Usuario, TareasSubGrupos.ID AS TareaSubGrupoID
FROM Usuarios
LEFT JOIN MiembrosSubgrupo ON Usuarios.ID = MiembrosSubgrupo.UsuarioID
LEFT JOIN TareasSubGrupos ON Usuarios.ID = TareasSubGrupos.Id_Usuario
WHERE MiembrosSubgrupo.SubgrupoID = 7;

select * from tareas;

SELECT T.ID, T.Nombre, T.Descripcion, T.Fecha_creacion
FROM Tareas AS T
LEFT JOIN TareasSubGrupos AS TS ON T.ID = TS.Id_Tarea AND TS.Id_Usuario = 7
WHERE T.SubGrupo_ID = 7 AND TS.ID IS NULL AND T.estado = 1;


SELECT T.ID, T.Nombre, T.Descripcion, T.Fecha_creacion
FROM Tareas AS T
LEFT JOIN TareasSubGrupos AS TS ON T.ID = TS.Id_Tarea AND TS.Id_Usuario != 7
LEFT JOIN MiembrosSubgrupo AS MS ON T.SubGrupo_ID = MS.SubgrupoID AND MS.UsuarioID = 7
WHERE T.SubGrupo_ID = 7 AND T.estado = 1;


SELECT T.ID, T.Nombre, T.Descripcion, T.Fecha_creacion
                FROM Tareas AS T
                LEFT JOIN TareasSubGrupos AS TS ON T.ID = TS.Id_Tarea
                LEFT JOIN MiembrosSubgrupo AS MS ON T.SubGrupo_ID = MS.SubgrupoID
                WHERE T.SubGrupo_ID = 7
               AND TS.Id_Usuario != 6  OR TS.Id_Usuario IS NULL
                AND MS.UsuarioID = 6 and T.estado = 1;


-- Subgrupo especifico
SELECT T.ID, T.Nombre, T.Descripcion, T.Fecha_creacion
FROM Tareas AS T
LEFT JOIN TareasSubGrupos AS TS ON T.ID = TS.Id_Tarea
LEFT JOIN MiembrosSubgrupo AS MS ON T.SubGrupo_ID = MS.SubgrupoID
WHERE T.SubGrupo_ID = 7
AND TS.Id_Usuario != 6 OR TS.Id_Usuario IS NULL
AND MS.UsuarioID = 6 and T.estado = 1;


-- General
SELECT T.ID, T.Nombre AS Tarea, T.Descripcion, T.Fecha_creacion, S.Nombre AS Nombre_SubGrupo
FROM Tareas AS T
LEFT JOIN TareasSubGrupos AS TS ON T.ID = TS.Id_Tarea
LEFT JOIN MiembrosSubgrupo AS MS ON T.SubGrupo_ID = MS.SubgrupoID
LEFT JOIN Subgrupo AS S ON T.SubGrupo_ID = S.ID
WHERE 
(TS.Id_Usuario != 6 OR TS.Id_Usuario IS NULL)
AND MS.UsuarioID = 6;
select * from MiembrosGrupo;
DELETE FROM MiembrosGrupo WHERE UsuarioID = 7 and GrupoID = 5;

