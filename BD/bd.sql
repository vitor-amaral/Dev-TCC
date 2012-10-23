SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `sc_tccProfileTracer` ;
CREATE SCHEMA IF NOT EXISTS `sc_tccProfileTracer` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `sc_tccProfileTracer` ;

-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Produto` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Produto` (
  `pro_id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `pro_nome` VARCHAR(45) NOT NULL ,
  `pro_preco` DECIMAL(10,2) NOT NULL ,
  `pro_tipo` VARCHAR(45) NOT NULL COMMENT 'Se é Bebida, Comida, Entrada, etc. ' ,
  PRIMARY KEY (`pro_id`) ,
  UNIQUE INDEX `pro_id_UNIQUE` (`pro_id` ASC) ,
  UNIQUE INDEX `pro_nome_UNIQUE` (`pro_nome` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Cidade` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Cidade` (
  `cid_id` INT NOT NULL AUTO_INCREMENT ,
  `cid_nome` VARCHAR(45) NOT NULL ,
  `uf_sigla` CHAR(2) NOT NULL ,
  PRIMARY KEY (`cid_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`TipoAcesso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`TipoAcesso` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`TipoAcesso` (
  `tpa_id` TINYINT NULL AUTO_INCREMENT ,
  `tpa_tipo` VARCHAR(30) NOT NULL COMMENT 'Se tera acesso somente para consulta dos dados, ou se poderá  alterar/excluir informações. Se poderá ter acesso as informações gerenciais ou não. ' ,
  PRIMARY KEY (`tpa_id`) ,
  UNIQUE INDEX `tpa_tipo_UNIQUE` (`tpa_tipo` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Cargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Cargo` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Cargo` (
  `car_id` TINYINT NOT NULL AUTO_INCREMENT ,
  `car_descricao` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`car_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Funcionario` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Funcionario` (
  `func_id` INT NOT NULL AUTO_INCREMENT ,
  `func_nome` VARCHAR(45) NOT NULL ,
  `func_matricula` VARCHAR(10) NOT NULL ,
  `car_id` TINYINT NOT NULL ,
  PRIMARY KEY (`func_id`) ,
  INDEX `fk_Funcionario_Cargo` (`car_id` ASC) ,
  CONSTRAINT `fk_Funcionario_Cargo`
    FOREIGN KEY (`car_id` )
    REFERENCES `sc_tccProfileTracer`.`Cargo` (`car_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Usuario` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Usuario` (
  `usu_id` INT NOT NULL AUTO_INCREMENT ,
  `usu_login` VARCHAR(20) NOT NULL ,
  `usu_senha` CHAR(8) NOT NULL ,
  `tpa_id` TINYINT NOT NULL ,
  `func_id` INT NOT NULL ,
  PRIMARY KEY (`usu_id`, `func_id`) ,
  UNIQUE INDEX `usu_login_UNIQUE` (`usu_login` ASC) ,
  INDEX `fk_Usuario_TipoAcesso` (`tpa_id` ASC) ,
  INDEX `fk_Usuario_Funcionario` (`func_id` ASC) ,
  UNIQUE INDEX `func_id_UNIQUE` (`func_id` ASC) ,
  CONSTRAINT `fk_Usuario_TipoAcesso`
    FOREIGN KEY (`tpa_id` )
    REFERENCES `sc_tccProfileTracer`.`TipoAcesso` (`tpa_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Funcionario`
    FOREIGN KEY (`func_id` )
    REFERENCES `sc_tccProfileTracer`.`Funcionario` (`func_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Cliente` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Cliente` (
  `cli_id` INT NOT NULL AUTO_INCREMENT ,
  `cli_nome` VARCHAR(50) NULL ,
  `cli_referencia` VARCHAR(70) NULL COMMENT 'Algum comentário que ajude a lembrar do cliente em questão. Ex: \"Zé da padaria\", \"Careca\", \"amigo do Geraldo\", etc' ,
  `cli_dtNasc` DATE NULL ,
  `cli_email` VARCHAR(50) NULL ,
  `usu_id` INT NOT NULL COMMENT 'usuário que realizou o cadastro desse cliente.' ,
  `cli_estCivil` TINYINT NULL ,
  `cli_apelido` VARCHAR(50) NULL ,
  `cli_id_indicador` INT NULL ,
  PRIMARY KEY (`cli_id`) ,
  INDEX `fk_Cliente_Usuario` (`usu_id` ASC) ,
  INDEX `fk_Cliente_Cliente` (`cli_id_indicador` ASC) ,
  UNIQUE INDEX `uq_Nome_Referencia` (`cli_nome` ASC, `cli_referencia` ASC) ,
  CONSTRAINT `fk_Cliente_Usuario`
    FOREIGN KEY (`usu_id` )
    REFERENCES `sc_tccProfileTracer`.`Usuario` (`usu_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cliente_Cliente`
    FOREIGN KEY (`cli_id_indicador` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Endereco` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Endereco` (
  `end_id` INT NOT NULL AUTO_INCREMENT ,
  `end_rua` VARCHAR(45) NULL ,
  `end_num` SMALLINT NULL ,
  `end_complemento` VARCHAR(45) NULL ,
  `end_bairro` VARCHAR(45) NULL ,
  `end_cep` CHAR(8) NULL ,
  `cid_id` INT NOT NULL ,
  `cli_id` INT NOT NULL ,
  PRIMARY KEY (`end_id`, `cli_id`) ,
  INDEX `fk_Endereco_Cidade` (`cid_id` ASC) ,
  INDEX `fk_Endereco_Cliente1` (`cli_id` ASC) ,
  CONSTRAINT `fk_Endereco_Cidade`
    FOREIGN KEY (`cid_id` )
    REFERENCES `sc_tccProfileTracer`.`Cidade` (`cid_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Endereco_Cliente1`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Pedido` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Pedido` (
  `ped_id` INT NOT NULL AUTO_INCREMENT ,
  `ped_data` DATE NOT NULL ,
  `cli_id` INT NOT NULL ,
  PRIMARY KEY (`ped_id`) ,
  INDEX `fk_Pedido_Cliente` (`cli_id` ASC) ,
  CONSTRAINT `fk_Pedido_Cliente`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`ProdutoPedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`ProdutoPedido` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`ProdutoPedido` (
  `pro_id` SMALLINT NOT NULL ,
  `ped_id` INT NOT NULL ,
  `proped_qtde` SMALLINT NOT NULL ,
  `proped_comentario` VARCHAR(100) NULL COMMENT 'alguma preferencia do cliente em relacao ao produto. Ex: Sem açúcar, pouco sal, com gelo, com maionese, etc.\" VERIFICAR A POSSIBILIDADE DE VIRAR UMA TABELA' ,
  PRIMARY KEY (`pro_id`, `ped_id`) ,
  INDEX `fk_ProdutoPedido_Pedido` (`ped_id` ASC) ,
  CONSTRAINT `fk_ProdutoPedido_Produto`
    FOREIGN KEY (`pro_id` )
    REFERENCES `sc_tccProfileTracer`.`Produto` (`pro_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProdutoPedido_Pedido`
    FOREIGN KEY (`ped_id` )
    REFERENCES `sc_tccProfileTracer`.`Pedido` (`ped_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`CategoriaReclamacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`CategoriaReclamacao` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`CategoriaReclamacao` (
  `cat_id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `cat_descricao` VARCHAR(30) NOT NULL COMMENT 'Se é referente ao atendimento, a comida, a bebida, ao lugar, etc.' ,
  PRIMARY KEY (`cat_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Reclamacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Reclamacao` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Reclamacao` (
  `rec_id` INT NOT NULL AUTO_INCREMENT ,
  `rec_descricao` VARCHAR(200) NOT NULL ,
  `rec_titulo` VARCHAR(45) NOT NULL ,
  `rec_status` SMALLINT NOT NULL COMMENT 'Se e positiva ou negativa' ,
  `cat_id` SMALLINT NOT NULL ,
  `cli_id` INT NULL COMMENT 'cliente que efetuou a reclamacão, se a mesma foi feita por um cliente.' ,
  PRIMARY KEY (`rec_id`) ,
  INDEX `fk_Reclamacao_CategoriaReclamacao` (`cat_id` ASC) ,
  INDEX `fk_Reclamacao_Cliente` (`cli_id` ASC) ,
  CONSTRAINT `fk_Reclamacao_CategoriaReclamacao`
    FOREIGN KEY (`cat_id` )
    REFERENCES `sc_tccProfileTracer`.`CategoriaReclamacao` (`cat_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reclamacao_Cliente`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Frequencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Frequencia` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Frequencia` (
  `freq_data` DATE NOT NULL ,
  `cli_id` INT NOT NULL ,
  PRIMARY KEY (`freq_data`, `cli_id`) ,
  INDEX `fk_Frequencia_Cliente` (`cli_id` ASC) ,
  CONSTRAINT `fk_Frequencia_Cliente`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Evento` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Evento` (
  `ev_id` INT NOT NULL AUTO_INCREMENT ,
  `ev_nome` VARCHAR(45) NOT NULL ,
  `ev_tema` VARCHAR(45) NULL ,
  `ev_descricao` VARCHAR(150) NOT NULL ,
  `ev_data` DATE NOT NULL ,
  `usu_id` INT NOT NULL ,
  `ev_hora` TIME NOT NULL ,
  PRIMARY KEY (`ev_id`) ,
  INDEX `fk_Evento_Usuario` (`usu_id` ASC) ,
  CONSTRAINT `fk_Evento_Usuario`
    FOREIGN KEY (`usu_id` )
    REFERENCES `sc_tccProfileTracer`.`Usuario` (`usu_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Mensagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Mensagem` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Mensagem` (
  `mens_id` INT NOT NULL AUTO_INCREMENT ,
  `mens_titulo` VARCHAR(45) NOT NULL ,
  `mens_texto` TEXT NOT NULL ,
  `usu_id` INT NOT NULL ,
  PRIMARY KEY (`mens_id`) ,
  INDEX `fk_Mensagem_Usuario` (`usu_id` ASC) ,
  CONSTRAINT `fk_Mensagem_Usuario`
    FOREIGN KEY (`usu_id` )
    REFERENCES `sc_tccProfileTracer`.`Usuario` (`usu_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Ambiente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Ambiente` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Ambiente` (
  `amb_id` TINYINT NOT NULL AUTO_INCREMENT ,
  `amb_descricao` VARCHAR(150) NOT NULL ,
  `amb_nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`amb_id`) ,
  UNIQUE INDEX `amb_nome_UNIQUE` (`amb_nome` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`CategoriaResposta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`CategoriaResposta` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`CategoriaResposta` (
  `catresp_id` INT NOT NULL ,
  `catresp_descricao` VARCHAR(45) NOT NULL ,
  `catresp_referencia` BIT NOT NULL COMMENT 'Se é uma resposta que será o id de alguma tabela = 1, senão = 0' ,
  `catresp_tabReferencia` VARCHAR(45) NULL COMMENT 'Qual a tabela que fara referencia na resposta' ,
  PRIMARY KEY (`catresp_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Pergunta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Pergunta` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Pergunta` (
  `perg_id` INT NOT NULL ,
  `perg_descricao` VARCHAR(100) NOT NULL ,
  `catresp_id` INT NOT NULL ,
  PRIMARY KEY (`perg_id`) ,
  INDEX `fk_Pergunta_CategoriaResposta` (`catresp_id` ASC) ,
  CONSTRAINT `fk_Pergunta_CategoriaResposta`
    FOREIGN KEY (`catresp_id` )
    REFERENCES `sc_tccProfileTracer`.`CategoriaResposta` (`catresp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Resposta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Resposta` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Resposta` (
  `resp_id` INT NOT NULL ,
  `resp_valor` VARCHAR(45) NOT NULL ,
  `catresp_id` INT NOT NULL ,
  PRIMARY KEY (`resp_id`) ,
  INDEX `fk_Resposta_CategoriaResposta` (`catresp_id` ASC) ,
  CONSTRAINT `fk_Resposta_CategoriaResposta`
    FOREIGN KEY (`catresp_id` )
    REFERENCES `sc_tccProfileTracer`.`CategoriaResposta` (`catresp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`PreferenciaCliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`PreferenciaCliente` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`PreferenciaCliente` (
  `cli_id` INT NOT NULL ,
  `perg_id` INT NOT NULL ,
  `resp_id` INT NOT NULL ,
  `pref_opcao` TINYINT NOT NULL COMMENT 'Ordem de prioridade daquela resposta' ,
  `pref_comentario` VARCHAR(150) NULL ,
  INDEX `fk_PreferenciaCliente_Referencia_Cliente` (`cli_id` ASC) ,
  INDEX `fk_PreferenciaCliente_Referencia_Pergunta` (`perg_id` ASC) ,
  INDEX `fk_PreferenciaCliente_Referencia_Resposta` (`resp_id` ASC) ,
  CONSTRAINT `fk_PreferenciaCliente_Referencia_Cliente`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PreferenciaCliente_Referencia_Pergunta`
    FOREIGN KEY (`perg_id` )
    REFERENCES `sc_tccProfileTracer`.`Pergunta` (`perg_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PreferenciaCliente_Referencia_Resposta`
    FOREIGN KEY (`resp_id` )
    REFERENCES `sc_tccProfileTracer`.`Resposta` (`resp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`PreferenciaCliente_Referencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`PreferenciaCliente_Referencia` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`PreferenciaCliente_Referencia` (
  `cli_id` INT NOT NULL ,
  `perg_id` INT NOT NULL ,
  `pref_opcao` TINYINT NOT NULL ,
  `pref_comentario` VARCHAR(150) NULL ,
  `pref_resp` INT NOT NULL COMMENT 'os ids de outras tabelas, que servirão como resposta pra pergunta em questão.  EX: Funcionário preferido.' ,
  INDEX `fk_PreferenciaCliente_Cliente1` (`cli_id` ASC) ,
  INDEX `fk_PreferenciaCliente_Pergunta1` (`perg_id` ASC) ,
  CONSTRAINT `fk_PreferenciaCliente_Cliente`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PreferenciaCliente_Pergunta`
    FOREIGN KEY (`perg_id` )
    REFERENCES `sc_tccProfileTracer`.`Pergunta` (`perg_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sc_tccProfileTracer`.`Telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sc_tccProfileTracer`.`Telefone` ;

CREATE  TABLE IF NOT EXISTS `sc_tccProfileTracer`.`Telefone` (
  `tel_id` INT NOT NULL AUTO_INCREMENT ,
  `tel_telefone` CHAR(14) NOT NULL ,
  `tel_tipo` TINYINT(4) NOT NULL COMMENT '1 - Fixo; 2 - Celular' ,
  `tel_observacao` VARCHAR(100) NULL ,
  `cli_id` INT NOT NULL ,
  PRIMARY KEY (`tel_id`, `cli_id`) ,
  INDEX `fk_Telefone_Cliente1` (`cli_id` ASC) ,
  CONSTRAINT `fk_Telefone_Cliente1`
    FOREIGN KEY (`cli_id` )
    REFERENCES `sc_tccProfileTracer`.`Cliente` (`cli_id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Cidade`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Cidade` (`cid_id`, `cid_nome`, `uf_sigla`) VALUES (1, 'Bauru', 'SP');
INSERT INTO `sc_tccProfileTracer`.`Cidade` (`cid_id`, `cid_nome`, `uf_sigla`) VALUES (2, 'Agudos', 'SP');
INSERT INTO `sc_tccProfileTracer`.`Cidade` (`cid_id`, `cid_nome`, `uf_sigla`) VALUES (3, 'Pederneiras', 'SP');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`TipoAcesso`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`TipoAcesso` (`tpa_id`, `tpa_tipo`) VALUES (1, 'Consulta');
INSERT INTO `sc_tccProfileTracer`.`TipoAcesso` (`tpa_id`, `tpa_tipo`) VALUES (2, 'Cadastro');
INSERT INTO `sc_tccProfileTracer`.`TipoAcesso` (`tpa_id`, `tpa_tipo`) VALUES (3, 'Gerencial');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Cargo` (`car_id`, `car_descricao`) VALUES (1, 'Gerente');
INSERT INTO `sc_tccProfileTracer`.`Cargo` (`car_id`, `car_descricao`) VALUES (2, 'Garçom');
INSERT INTO `sc_tccProfileTracer`.`Cargo` (`car_id`, `car_descricao`) VALUES (3, 'Cozinheiro');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Funcionario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Funcionario` (`func_id`, `func_nome`, `func_matricula`, `car_id`) VALUES (1, 'Func Padrao', '123456', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Usuario` (`usu_id`, `usu_login`, `usu_senha`, `tpa_id`, `func_id`) VALUES (1, 'usu_padrao', '123456', 1, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Cliente`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Cliente` (`cli_id`, `cli_nome`, `cli_referencia`, `cli_dtNasc`, `cli_email`, `usu_id`, `cli_estCivil`, `cli_apelido`, `cli_id_indicador`) VALUES (1, 'cli Padrao', NULL, NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `sc_tccProfileTracer`.`Cliente` (`cli_id`, `cli_nome`, `cli_referencia`, `cli_dtNasc`, `cli_email`, `usu_id`, `cli_estCivil`, `cli_apelido`, `cli_id_indicador`) VALUES (2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`CategoriaReclamacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`CategoriaReclamacao` (`cat_id`, `cat_descricao`) VALUES (1, 'Atendimento');
INSERT INTO `sc_tccProfileTracer`.`CategoriaReclamacao` (`cat_id`, `cat_descricao`) VALUES (2, 'Pratos');
INSERT INTO `sc_tccProfileTracer`.`CategoriaReclamacao` (`cat_id`, `cat_descricao`) VALUES (3, 'Bebida');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`CategoriaResposta`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`CategoriaResposta` (`catresp_id`, `catresp_descricao`, `catresp_referencia`, `catresp_tabReferencia`) VALUES (1, 'Sim/Nao', 0, NULL);
INSERT INTO `sc_tccProfileTracer`.`CategoriaResposta` (`catresp_id`, `catresp_descricao`, `catresp_referencia`, `catresp_tabReferencia`) VALUES (2, 'Futebol', 0, NULL);
INSERT INTO `sc_tccProfileTracer`.`CategoriaResposta` (`catresp_id`, `catresp_descricao`, `catresp_referencia`, `catresp_tabReferencia`) VALUES (3, 'Música', 0, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Pergunta`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Pergunta` (`perg_id`, `perg_descricao`, `catresp_id`) VALUES (1, 'Fumante ?', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sc_tccProfileTracer`.`Resposta`
-- -----------------------------------------------------
START TRANSACTION;
USE `sc_tccProfileTracer`;
INSERT INTO `sc_tccProfileTracer`.`Resposta` (`resp_id`, `resp_valor`, `catresp_id`) VALUES (1, 'Sim', 1);
INSERT INTO `sc_tccProfileTracer`.`Resposta` (`resp_id`, `resp_valor`, `catresp_id`) VALUES (2, 'Não', 1);
INSERT INTO `sc_tccProfileTracer`.`Resposta` (`resp_id`, `resp_valor`, `catresp_id`) VALUES (3, 'Palmeiras', 2);
INSERT INTO `sc_tccProfileTracer`.`Resposta` (`resp_id`, `resp_valor`, `catresp_id`) VALUES (4, 'Santos', 2);
INSERT INTO `sc_tccProfileTracer`.`Resposta` (`resp_id`, `resp_valor`, `catresp_id`) VALUES (5, 'São Paulo', 2);

COMMIT;
