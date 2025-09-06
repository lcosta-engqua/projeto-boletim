CREATE DATABASE boletim
    DEFAULT CHARACTER SET = 'utf8mb4';

    USE boletim;

    -- DROP TABLE usuarios;
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

    INSERT INTO usuarios VALUES(1, 'aluno1', '00000000000', '1980-09-01', 1, 'aluno1@teste', '75000000000', 'Rua A', '1', 'Centro', 'Fsa', 'Bahia', 'Brasil', null, null);
    INSERT INTO usuarios VALUES(2, 'aluno2', '00000000000', '1980-09-01', 2, 'aluno2@teste', '75000000000', 'Rua A', '1', 'Centro', 'Fsa', 'Bahia', 'Brasil', null, null);
    INSERT INTO usuarios VALUES(3, 'aluno3', '00000000000', '1980-09-01', 3, 'aluno3@teste', '75000000000', 'Rua A', '1', 'Centro', 'Fsa', 'Bahia', 'Brasil', null, null);
    INSERT INTO usuarios VALUES(4, 'aluno4', '00000000000', '1980-09-01', 4, 'aluno4@teste', '75000000000', 'Rua A', '1', 'Centro', 'Fsa', 'Bahia', 'Brasil', null, null);
    -- DELETE FROM usuarios;
    SELECT * FROM usuarios;

    CREATE TABLE cursos(
      id INT PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(100) NOT NULL,
      descricao VARCHAR(100),
      ativo ENUM('S', 'N') NOT NULL,
      data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
      data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    INSERT INTO cursos VALUES(1, 'Java', 'Destinado ao ensinamento de Programação em Java', 1, null, null);
    INSERT INTO cursos VALUES(2, 'Dados', 'Destinado ao ensinamento de Análise de Dados', 1, null, null);
    INSERT INTO cursos VALUES(3, 'PHP', 'Destinado ao ensinamento de Programação em PHP', 1, null, null);

    SELECT * FROM cursos;
    UPDATE cursos SET ativo = 'N' WHERE id = 1;