create database sitemusica;
use sitemusica;
-- estrutura da tabela
create table tbprodutos(
id_produto int(11) not null,
id_tipo_produto int not null,
descri_produto varchar(100) not null,
resumo_produto varchar(1000) default null,
valor_produto decimal (10,2) default null,
imagem_produto varchar(50) default null, -- grava o caminho da imagem
-- imagem blob, grava a imagem
destaque_produto enum ('sim','não') not null
)engine=InnoDB default charset=utf8;

-- extraindo dados da tb tipos
insert into `tbprodutos`(`id_produto`,`id_tipo_produto`,`descri_produto`,`resumo_produto`,`valor_produto`,`imagem_produto`,`destaque_produto`) values
(1,1,'Lespol semiacustica','uma bela guitarra semiacustica, dourada como deve ser','1200.99','guitarra_semidourada.jpg','sim'),
(2,1,'Epiphane','Um classico do rock, potencializa ao maximo sua distorção','2500.99','guitarra_epiphane.png','não'),
(3,1,'Giannini','Classica para todos os gostos, super versatil','799.99','guitarra_gianini.jpg','não'),
(4,1,'Lespol','A mais completa, com exelentes captadores e um ótimo designe','750.50','guitarra_less.jpg','sim'),
(5,1,'SemiAcustica vinho','Guitarra classica e bela com um belo desenho','4785.99','guitarra_semivinho.jpg','não'),
(6,2,'Bateria dw','Bateria completa para um baterista completo','15000.00','bateria_dw.jpg','sim'),
(7,2,'Bateria bege','Bateria basica e simples','4999.99','bateria_gri.jpg','não'),
(8,2,'Bateria ASBA','Bateria com um bom som incorpado','12000.00','bateria_asba.jpg','não'),
(9,2,'Bateria ASBA','Bateria e muito barulho','9999.99','bateria_asba1.jpg','não'),
(10,1,'Violao giannini','Violão','499.99','violao_gianini.jpg','não'),
(11,2,'Bateria yamaha','Bateria cool','5000.00','bateria_yamaha.jpg','não'),
(12,4,'PegalBoard','Set de pedais','1499.99','pedalboard.jpg','sim');


-- estrutura da tabela tipos
create table tbtipos(
id_tipo int(11) not null,
sigla_tipo varchar(3) not null,
rotulo_tipo varchar(15) not null
)engine=InnoDB default charset=utf8;

-- extraindo dados da tb tipos
insert into `tbtipos` (`id_tipo`,`sigla_tipo`,`rotulo_tipo`) values 
(1,'COR','CORDAS'), (2,'BAT','PERCURSIVOS'),(3,'SOP','SOPROS'),(4,'Ace','Acessorios');

-- estrutura da tabela tipos
create table tbusuario(
id_usuario int(11) not null,
login_usuario varchar (30) not null unique,
senha_usuario varchar (8) not null,
nivel_usuario enum ('sup','com','cli') not null
)engine=InnoDB default charset=utf8;

insert into `tbusuario`(`id_usuario`,`login_usuario`,`senha_usuario`,`nivel_usuario`) values 
(1,'mateus','1234','sup'),
(2,'user','9876','com'),
(3,'obito','0123','cli'),
(4,'teus','1234','sup');

-- indices da tabela tb produto

alter table tbprodutos
add primary key(id_produto),
add key id_tipo_produto_fk (id_tipo_produto);

-- indices da tabela tipos

alter table tbtipos
add primary key(id_tipo);

-- indices da tabela tbusuarios
alter table tbusuarios
add primary key(id_usuario);

-- definindo auto incremento tb produto

alter table tbprodutos
modify id_produto int(11) not null auto_increment, auto_increment=13;

alter table tbtipos
modify id_tipo int(11) not null auto_increment, auto_increment=5;

alter table tbusuario
modify id_usuario int(11) not null auto_increment, auto_increment=5;

-- Restrição (contraint) da tabela tbprodutos
alter table tbprodutos
add constraint id_tipo_produto_fk foreign key(id_tipo_produto)
references tbtipos(id_tipo) on delete no action on update no action;

create view vw_tbprodutos as 
select p.id_produto,
p.id_tipo_produto,
t.sigla_tipo,
t.rotulo_tipo,
p.descri_produto,
p.resumo_produto,
p.valor_produto,
p.imagem_produto,
p.destaque_produto
from tbprodutos p
join tbtipos t
where p.id_tipo_produto = t.id_tipo;

ALTER TABLE `sitemusica`.`tbprodutos` 
ADD COLUMN `deletado` TIMESTAMP NULL DEFAULT current_timestamp AFTER `destaque_produto`;

 update tbprodutos set deletado = null where id_produto between 1 and 12;

CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `vw_tbprodutos` AS
    SELECT 
        `p`.`id_produto` AS `id_produto`,
        `p`.`id_tipo_produto` AS `id_tipo_produto`,
        `t`.`sigla_tipo` AS `sigla_tipo`,
        `t`.`rotulo_tipo` AS `rotulo_tipo`,
        `p`.`descri_produto` AS `descri_produto`,
        `p`.`resumo_produto` AS `resumo_produto`,
        `p`.`valor_produto` AS `valor_produto`,
        `p`.`imagem_produto` AS `imagem_produto`,
        `p`.`destaque_produto` AS `destaque_produto`,
        `p`.`deletado` AS `deletado`
    FROM
        (`tbprodutos` `p`
        JOIN `tbtipos` `t`)
    WHERE
        (`p`.`id_tipo_produto` = `t`.`id_tipo`);

select * from tbprodutos;

select * from vw_tbproduto order by descri_produto asc;

