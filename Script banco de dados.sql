CREATE DATABASE turismo;
USE turismo;

-- =========================
-- Tabela: Usuario
-- =========================
CREATE TABLE Usuario (
  idUsuario INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(45) NOT NULL,
  Apelido Varchar(45) not null,
  Login VARCHAR(45) NOT NULL,
  Senha VARCHAR(64) NOT NULL,
  Pontuacao INT DEFAULT 0, 
  Ranking VARCHAR(45),
  Cidade VARCHAR(45),
  foto longblob 
);

-- =========================
-- Tabela: Pontos_turisticos
-- =========================
CREATE TABLE Pontos_turisticos (
  idPontos_turisticos INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(255) NOT NULL,
  Descricao VARCHAR(255),
  Endereco Varchar(255),
  Foto varchar(255)
);

-- =========================
-- Tabela: Descontos
-- =========================
CREATE TABLE Estabelecimento (
  idEstabelecimentos INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100),
  Imagem varchar(255),
  Descricao text
);

-- =========================
-- Tabela: Conquistas
-- =========================
CREATE TABLE Conquistas (
  idConquista INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(45),
  Objetivo VARCHAR(255),
  Pontos LONGTEXT,
  Imagem VARCHAR(255),
  Ativo TINYINT
);

-- =========================
-- Tabela: Usuario_has_Pontos_turisticos
-- =========================
CREATE TABLE Usuario_has_Pontos_turisticos (
  Usuario_idUsuario INT NOT NULL,
  Pontos_turisticos_idPontos_turisticos INT NOT NULL,
  PRIMARY KEY (Usuario_idUsuario, Pontos_turisticos_idPontos_turisticos),
  FOREIGN KEY (Usuario_idUsuario) REFERENCES Usuario(idUsuario),
  FOREIGN KEY (Pontos_turisticos_idPontos_turisticos) REFERENCES Pontos_turisticos(idPontos_turisticos)
);

-- =========================
-- Tabela: Usuario_has_Estabelecimento
-- =========================
CREATE TABLE Usuario_has_Estabelecimentos (
  Usuario_idUsuario INT NOT NULL,
  Estabelecimento_idEstabelecimento INT NOT NULL,
  PRIMARY KEY (Usuario_idUsuario, Estabelecimento_idEstabelecimento),
  FOREIGN KEY (Usuario_idUsuario) REFERENCES Usuario(idUsuario),
  FOREIGN KEY (Estabelecimento_idEstabelecimento) REFERENCES Estabelecimento(idEstabelecimentos)
);

-- =========================
-- Tabela: Usuario_has_Conquistas
-- =========================
CREATE TABLE Usuario_has_Conquistas (
  Usuario_idUsuario INT NOT NULL,
  Conquistas_idConquistas INT NOT NULL,
  Data_adquirida DATE,
  PRIMARY KEY (Usuario_idUsuario, Conquistas_idConquistas),
  FOREIGN KEY (Usuario_idUsuario) REFERENCES Usuario(idUsuario),
  FOREIGN KEY (Conquistas_idConquistas) REFERENCES Conquistas(idConquista)
);

INSERT INTO Pontos_turisticos (Nome, Descricao, Endereco, Foto) VALUES
('Parque Natural Municipal da Cachoeira da Marta',
 'Trilhas e cachoeira com natureza preservada',
 'Rodovia Marechal Rondon, km 243 - Bairro Recanto da Amizade',
 'cachoeira-marta.jpg'),
 
('Ecoparque Pedra do Índio',
 'Mirante com vista para as Três Pedras e restaurante',
 'Estrada para a Fazenda Boa Vista, KM 07',
 'Cachoeira indiana.jpg'),
 
('Rio Bonito',
 'Bairro com acesso ao Rio Tietê e esportes náuticos',
 'Acesso pela Rodovia Alcides Soares ou Rodovia Geraldo de Barros',
 'Rio Bonito.jpg'),
 
('Cachoeira Indiana',
 'Cachoeira com restaurante de comida caipira',
 'Espaço Indiana - Botucatu/SP',
 'Cachoeira indiana.jpg'),
 
('Cachoeira Pavuna',
 'Conjunto de cachoeiras e trilhas em fazenda particular',
 'Rod. Marechal Rondon, 14977-14985 - Jardim Nossa Sra. da Penha',
 'Cachoeira-pavuna.jpg'),
 
('Parque Municipal Joaquim Amaral Amando de Barros',
 'Parque urbano com trilhas, lago e área verde preservada',
 'Rua Dr. José Barbosa de Barros, s/nº - Jardim Paraíso',
 'parque.jpg'),
 
('Base da Nuvem',
 'Mirante natural usado para voo livre e observação',
 'Estr. Mun. Geraldo Biral, 98 - Botucatu/SP',
 'parapente.jpeg'),
 
('Mirante da Capela de São Cristóvão',
 'Capela e mirante para contemplar o nascer do sol',
 'Rodovia Marechal Rondon - Botucatu/SP',
 'capela.jpg'),
 
('Mirante do Morro do Peru - Vale da Bocaina',
 'Mirante com vista para o Morro do Peru e linha férrea',
 'Estrada Municipal Pará-Piapara - Botucatu/SP',
 'morro do peru.jpg');
 
INSERT INTO Estabelecimento (Nome, Imagem, Descricao) VALUES
('Arte e Convívio', 'Arte e Convívio.jpg',
'Produtos artesanais produzidos por ONG com foco em inclusão social. Contato: (14) 3882-7087.'),

('Associação de Promoção Humana de Botucatu', 'Associação de Promoção Humana de Botucatu.png',
'Ateliê de artesãs que produzem peças para geração de renda. Contato: (14) 3882-3288.'),

('Cervera Arte', 'Cervera Arte.png',
'Aulas e encomendas de desenho, pintura, escultura, cerâmica e piano. Contato: (14) 98140-6817.'),

('Arte e Terapia – Acessórios Artesanais', 'Arte e Terapia.png',
'Acessórios artesanais feitos à mão. Contato: (14) 99745-7773.'),

('Dita Flora Aromas Especiais', 'Dita Flora Aromas Especiais.png',
'Aromas artesanais especiais. Contato: (11) 93046-1173.'),

('Escola de Ofícios da Demétria', 'Escola de Ofícios da Demétria.png',
'Oficinas e cursos de artesanato. Contato: (14) 98825-7005.'),

('Atelier Kolibri', 'Atelier Kolibri.png',
'Artesanato variado da região da Demétria. Contato: (14) 98804-1555.'),

('Eleonora Hoshino', 'Eleonora Hoshino.png',
'Artesanato e trabalhos manuais autorais. Contato: (14) 99774-8398.'),

('Atelier Quintal Ingá', 'Atelier Quintal Ingá.png',
'Ateliê artesanal com peças autorais. Contato: (14) 98800-4142.'),

('Churrascaria Tabajara', 'tabajara.png',
'Churrascaria tradicional de Botucatu. Contato: (14) XXXXX-XXXX.'),

('Academia Brazil', 'academia-brazil.png',
'Academia com equipamentos modernos e profissionais qualificados. Contato: (14) XXXXX-XXXX.'),

('Berimbau Auto Peças', 'berimbau.png',
'Auto peças para todos os modelos de veículos. Contato: (14) XXXXX-XXXX.'),

('Havan', 'havan.png',
'Loja de departamentos com variedade de produtos. Contato: (14) XXXXX-XXXX.'),

('Pizza Frita Semião', 'pizza-semiao.png',
'Pizza frita tradicional da região. Contato: (14) XXXXX-XXXX.');


 
select * from pontos_turisticos ; 

select * from usuario ;

select * from estabelecimento ;




