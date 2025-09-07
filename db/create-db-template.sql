CREATE DATABASE boletim
    DEFAULT CHARACTER SET = 'utf8mb4';

    USE boletim;
    CREATE TABLE usuarios(
      id INT PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(100) NOT NULL,
      documento VARCHAR(20),
      data_nascimento DATE,
      estado_civil ENUM('solteiro(a)', 'casado(a)', 'divorciado(a)', 'viuvo(a)'),
      email VARCHAR(100) NOT NULL UNIQUE,
      telefone VARCHAR(15),
      endereco VARCHAR(50),
      numero_end VARCHAR(10),
      bairro_end VARCHAR(50),
      cidade VARCHAR(50),
      estado VARCHAR(50),
      pais VARCHAR(50),
      data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
      data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    SELECT * FROM usuarios;

    CREATE TABLE cursos(
      id INT PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(100) NOT NULL,
      descricao VARCHAR(100),
      ativo ENUM('S', 'N') NOT NULL,
      data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
      data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    SELECT * FROM cursos;

    -- 1:N Um curso pode ter várias turmas
    CREATE TABLE turmas(
      id INT PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(100) NOT NULL,
      descricao VARCHAR(100),
      ativo ENUM('S', 'N') NOT NULL,
      curso_id INT,
      data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
      data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      FOREIGN KEY (curso_id) REFERENCES cursos(id)
    );
    SELECT * FROM turmas;
    SELECT turma.id, turma.nome, turma.descricao, curso.nome, turma.ativo FROM turmas turma
    INNER JOIN cursos curso ON curso.id = turma.curso_id;

    SELECT turma.id, turma.nome, turma.descricao, curso.nome, turma.ativo FROM turmas turma
    INNER JOIN cursos curso ON curso.id = turma.curso_id
    WHERE turma.id = 5;

    UPDATE turmas SET ativo = 'N' WHERE id = 1;


    SELECT * FROM cursos;

    INSERT INTO cursos VALUES(1, 'Java', 'Destinado ao ensinamento de Programação em Java', 1, null, null);
    INSERT INTO cursos VALUES(2, 'Dados', 'Destinado ao ensinamento de Análise de Dados', 1, null, null);
    INSERT INTO cursos VALUES(3, 'PHP', 'Destinado ao ensinamento de Programação em PHP', 1, null, null);

    SELECT * FROM cursos;
    UPDATE cursos SET ativo = 'N' WHERE id = 1;

    DROP TABLE disciplinas;
    CREATE TABLE disciplinas(
      id INT PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(50) NOT NULL,
      descricao VARCHAR(50),
      carga_horaria INT,
      curso_id INT,
      ativo ENUM('S', 'N') NOT NULL,
      data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
      data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      FOREIGN KEY (curso_id) REFERENCES cursos(id)
    );

    SELECT * FROM disciplinas;