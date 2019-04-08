Create Database login_niveis Character Set latin1 Collate latin1_general_ci;

Create Table niveis(
id tinyint(2) Unsigned Not Null auto_increment,
nome varchar(20) default '',
Primary Key (id),
Unique Key (nome)
)Type = innodb CHARACTER SET latin1 COLLATE latin1_general_ci;




Create Table usuarios(
id smallint(5) Unsigned Not Null auto_increment,
nome varchar(120) default '',
login varchar(30) Not Null,
senha char(32) Not Null,
id_nivel tinyint(2) Unsigned Not Null,
ativado enum("s", "n") default "n",
Foreign Key (id_nivel) References niveis(id)
  On Delete Restrict On Update Cascade,
Primary Key (id, id_nivel),
Unique Key (login)
)type = innodb CHARACTER SET latin1 COLLATE latin1_general_ci;



Insert Into niveis Values (NULL, 'Administração'), (NULL, 'Usuários');

Insert Into usuarios Values (NULL, 'Administrador', 'admin', '202cb962ac59075b964b07152d234b70', 1);