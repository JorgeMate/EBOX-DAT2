<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190402210749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE formato (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(127) NOT NULL, activo TINYINT(1) NOT NULL, notas LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_19BDE6735E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarea (id INT AUTO_INCREMENT NOT NULL, tarea VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trabajo (id INT AUTO_INCREMENT NOT NULL, idpedido INT DEFAULT NULL, s_path_paletiza VARCHAR(255) DEFAULT NULL, s_trabajo VARCHAR(127) NOT NULL, i_unidades INT NOT NULL, s_cod_art VARCHAR(31) DEFAULT NULL, s_orden_de_compra VARCHAR(63) DEFAULT NULL, mt_notas LONGTEXT DEFAULT NULL, i_finalizado TINYINT(1) NOT NULL, s_tipo_palet VARCHAR(127) DEFAULT NULL, i_en2pal TINYINT(1) NOT NULL, i_en_cajas TINYINT(1) NOT NULL, s_for_ban VARCHAR(127) DEFAULT NULL, s_separadores VARCHAR(127) DEFAULT NULL, s_apilado VARCHAR(127) DEFAULT NULL, i_uds_planta INT DEFAULT NULL, i_plantas_par SMALLINT NOT NULL, i_plantas_impar SMALLINT NOT NULL, i_peso_par SMALLINT NOT NULL, i_peso_impar SMALLINT NOT NULL, i_cantoneras TINYINT(1) NOT NULL, i_tapado TINYINT(1) NOT NULL, i_alt_par SMALLINT NOT NULL, i_alt_impar SMALLINT NOT NULL, mt_otros_gra LONGTEXT DEFAULT NULL, s_dimension_caja VARCHAR(127) DEFAULT NULL, i_uds_caja SMALLINT NOT NULL, i_cajas_planta SMALLINT NOT NULL, mt_otros_caj LONGTEXT DEFAULT NULL, s_dir1 VARCHAR(127) DEFAULT NULL, s_dir2 VARCHAR(127) DEFAULT NULL, s_dir3 VARCHAR(127) DEFAULT NULL, s_dir4 VARCHAR(127) DEFAULT NULL, s_dir5 VARCHAR(127) DEFAULT NULL, s_dir6 VARCHAR(127) DEFAULT NULL, i_eti_x_caja TINYINT(1) NOT NULL, n_kg_x_caja SMALLINT NOT NULL, i_eti_defecto TINYINT(1) NOT NULL, i_activo TINYINT(1) NOT NULL, i_lote TINYINT(1) NOT NULL, idsemi_pedido INT NOT NULL, n_peso_palet DOUBLE PRECISION NOT NULL, valor DOUBLE PRECISION NOT NULL, i_extranjero TINYINT(1) NOT NULL, manod DOUBLE PRECISION NOT NULL, venta DOUBLE PRECISION NOT NULL, t_changed DATETIME DEFAULT NULL, i_changed INT NOT NULL, t_added DATETIME DEFAULT NULL, i_added INT NOT NULL, id_anterior INT DEFAULT NULL, UNIQUE INDEX UNIQ_FDD6B80AE90EEC4B (id_anterior), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trabajo_semi (trabajo_id INT NOT NULL, semi_id INT NOT NULL, INDEX IDX_15AACD0E287A134A (trabajo_id), INDEX IDX_15AACD0EA6599C76 (semi_id), PRIMARY KEY(trabajo_id, semi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE codigo_s (id INT AUTO_INCREMENT NOT NULL, semi_id INT NOT NULL, pedido_id INT DEFAULT NULL, c_origen VARCHAR(1) DEFAULT NULL, i_externo TINYINT(1) DEFAULT NULL, s_codigo VARCHAR(10) NOT NULL, s_externo VARCHAR(32) DEFAULT NULL, i_loc SMALLINT DEFAULT NULL, i_unidades INT NOT NULL, i_uds_tomadas INT DEFAULT NULL, dt_consumo DATETIME DEFAULT NULL, t_changed DATETIME DEFAULT NULL, t_added DATETIME DEFAULT NULL, i_added INT DEFAULT NULL, s_notas VARCHAR(128) DEFAULT NULL, s_semi VARCHAR(127) DEFAULT NULL, valor DOUBLE PRECISION DEFAULT NULL, idpack_list INT DEFAULT NULL, i_changed INT DEFAULT NULL, UNIQUE INDEX UNIQ_50AA3EF73915C7E (s_codigo), INDEX IDX_50AA3EF7A6599C76 (semi_id), INDEX IDX_50AA3EF74854653A (pedido_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, INDEX IDX_C4EC16CEDE734E51 (cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, cod_conta VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_F41C9B255E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carpeta (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, formato_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, activa TINYINT(1) NOT NULL, ano SMALLINT NOT NULL, INDEX IDX_334DA23DDE734E51 (cliente_id), INDEX IDX_334DA23D8D02887B (formato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carpeta_trabajo (carpeta_id INT NOT NULL, trabajo_id INT NOT NULL, INDEX IDX_12250678DEAE5086 (carpeta_id), INDEX IDX_12250678287A134A (trabajo_id), PRIMARY KEY(carpeta_id, trabajo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semi (id INT AUTO_INCREMENT NOT NULL, s_semi VARCHAR(127) NOT NULL, i_externo TINYINT(1) DEFAULT NULL, i_en_cajas TINYINT(1) NOT NULL, i_uds_caja SMALLINT DEFAULT NULL, i_cajas_palet SMALLINT DEFAULT NULL, i_uds_palet SMALLINT NOT NULL, s_especificaciones VARCHAR(127) DEFAULT NULL, t_changed DATETIME DEFAULT NULL, i_changed INT DEFAULT NULL, t_added DATETIME DEFAULT NULL, i_added INT DEFAULT NULL, mt_notas LONGTEXT DEFAULT NULL, i_activo TINYINT(1) NOT NULL, i_lito_lote TINYINT(1) DEFAULT NULL, generico TINYINT(1) NOT NULL, stock INT DEFAULT NULL, stock_min INT DEFAULT NULL, valor DOUBLE PRECISION DEFAULT NULL, i_forzar_lote TINYINT(1) DEFAULT NULL, s_lote VARCHAR(63) DEFAULT NULL, id_anterior INT DEFAULT NULL, UNIQUE INDEX UNIQ_F2EF15B3E90EEC4B (id_anterior), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operario (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(127) NOT NULL, iname SMALLINT NOT NULL, activo TINYINT(1) NOT NULL, planta TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E677106C5E237E06 (name), UNIQUE INDEX UNIQ_E677106C2D67433B (iname), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tareasub (id INT AUTO_INCREMENT NOT NULL, tarea_id INT NOT NULL, tareasub VARCHAR(64) NOT NULL, INDEX IDX_5318980D6D5BDFE1 (tarea_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(63) NOT NULL, apellidos VARCHAR(63) NOT NULL, telefono VARCHAR(31) DEFAULT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE codigo_p (id INT AUTO_INCREMENT NOT NULL, trabajo_id INT NOT NULL, pedido_id INT DEFAULT NULL, c_origen VARCHAR(1) DEFAULT NULL, i_completo TINYINT(1) DEFAULT NULL, i_externo TINYINT(1) DEFAULT NULL, s_codigo VARCHAR(10) NOT NULL, s_externo VARCHAR(32) DEFAULT NULL, i_loc SMALLINT DEFAULT NULL, s_trabajo VARCHAR(127) DEFAULT NULL, idpack_list INT DEFAULT NULL, i_impar TINYINT(1) DEFAULT NULL, i_unidades INT NOT NULL, i_peso SMALLINT DEFAULT NULL, d_fecha_exp DATE DEFAULT NULL, t_changed DATETIME DEFAULT NULL, i_changed INT DEFAULT NULL, t_added DATETIME NOT NULL, i_added INT DEFAULT NULL, i_lote INT DEFAULT NULL, n_peso_palet DOUBLE PRECISION DEFAULT NULL, s_dir1 VARCHAR(63) DEFAULT NULL, s_dir2 VARCHAR(63) DEFAULT NULL, s_dir3 VARCHAR(63) DEFAULT NULL, s_dir4 VARCHAR(63) DEFAULT NULL, s_dir5 VARCHAR(63) DEFAULT NULL, s_dir6 VARCHAR(63) DEFAULT NULL, s_orden_de_compra VARCHAR(31) DEFAULT NULL, s_cod_art VARCHAR(31) DEFAULT NULL, valor DOUBLE PRECISION DEFAULT NULL, cerrado TINYINT(1) DEFAULT NULL, INDEX IDX_C9A36F4D287A134A (trabajo_id), INDEX IDX_C9A36F4D4854653A (pedido_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trabajo_semi ADD CONSTRAINT FK_15AACD0E287A134A FOREIGN KEY (trabajo_id) REFERENCES trabajo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trabajo_semi ADD CONSTRAINT FK_15AACD0EA6599C76 FOREIGN KEY (semi_id) REFERENCES semi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE codigo_s ADD CONSTRAINT FK_50AA3EF7A6599C76 FOREIGN KEY (semi_id) REFERENCES semi (id)');
        $this->addSql('ALTER TABLE codigo_s ADD CONSTRAINT FK_50AA3EF74854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE carpeta ADD CONSTRAINT FK_334DA23DDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE carpeta ADD CONSTRAINT FK_334DA23D8D02887B FOREIGN KEY (formato_id) REFERENCES formato (id)');
        $this->addSql('ALTER TABLE carpeta_trabajo ADD CONSTRAINT FK_12250678DEAE5086 FOREIGN KEY (carpeta_id) REFERENCES carpeta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carpeta_trabajo ADD CONSTRAINT FK_12250678287A134A FOREIGN KEY (trabajo_id) REFERENCES trabajo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tareasub ADD CONSTRAINT FK_5318980D6D5BDFE1 FOREIGN KEY (tarea_id) REFERENCES tarea (id)');
        $this->addSql('ALTER TABLE codigo_p ADD CONSTRAINT FK_C9A36F4D287A134A FOREIGN KEY (trabajo_id) REFERENCES trabajo (id)');
        $this->addSql('ALTER TABLE codigo_p ADD CONSTRAINT FK_C9A36F4D4854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carpeta DROP FOREIGN KEY FK_334DA23D8D02887B');
        $this->addSql('ALTER TABLE tareasub DROP FOREIGN KEY FK_5318980D6D5BDFE1');
        $this->addSql('ALTER TABLE trabajo_semi DROP FOREIGN KEY FK_15AACD0E287A134A');
        $this->addSql('ALTER TABLE carpeta_trabajo DROP FOREIGN KEY FK_12250678287A134A');
        $this->addSql('ALTER TABLE codigo_p DROP FOREIGN KEY FK_C9A36F4D287A134A');
        $this->addSql('ALTER TABLE codigo_s DROP FOREIGN KEY FK_50AA3EF74854653A');
        $this->addSql('ALTER TABLE codigo_p DROP FOREIGN KEY FK_C9A36F4D4854653A');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEDE734E51');
        $this->addSql('ALTER TABLE carpeta DROP FOREIGN KEY FK_334DA23DDE734E51');
        $this->addSql('ALTER TABLE carpeta_trabajo DROP FOREIGN KEY FK_12250678DEAE5086');
        $this->addSql('ALTER TABLE trabajo_semi DROP FOREIGN KEY FK_15AACD0EA6599C76');
        $this->addSql('ALTER TABLE codigo_s DROP FOREIGN KEY FK_50AA3EF7A6599C76');
        $this->addSql('DROP TABLE formato');
        $this->addSql('DROP TABLE tarea');
        $this->addSql('DROP TABLE trabajo');
        $this->addSql('DROP TABLE trabajo_semi');
        $this->addSql('DROP TABLE codigo_s');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE carpeta');
        $this->addSql('DROP TABLE carpeta_trabajo');
        $this->addSql('DROP TABLE semi');
        $this->addSql('DROP TABLE operario');
        $this->addSql('DROP TABLE tareasub');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE codigo_p');
    }
}
