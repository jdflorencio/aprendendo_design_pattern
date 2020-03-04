create table aluno (
    id integer,
    nome varchar(40),
    endereco varchar(40),
    telefone varchar(40),
    cidade varchar(40)
);

create table inscricao(
    id serial,
    ref_aluno integer,
    ref_turma integer,
    nota float,
    frequencia float,
    cacelada boolean,
    concluida boolean
);

create table turma(
    id integer,
    dia_semana integer,
    turno char(1),
    professor varchar(40),
    sala varchar(20),
    data_inicio date,
    encerrada boolean
);



create table curso (
    id integer,
    descricao varchar(40),
    duracao integer
);