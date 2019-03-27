<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327171447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trabajo (id INT AUTO_INCREMENT NOT NULL, idpedido INT DEFAULT NULL, s_path_paletiza VARCHAR(255) DEFAULT NULL, s_trabajo VARCHAR(127) NOT NULL, i_unidades INT NOT NULL, s_cod_art VARCHAR(31) DEFAULT NULL, s_orden_de_compra VARCHAR(63) DEFAULT NULL, mt_notas LONGTEXT DEFAULT NULL, i_finalizado TINYINT(1) NOT NULL, s_tipo_palet VARCHAR(127) DEFAULT NULL, i_en2pal TINYINT(1) NOT NULL, i_en_cajas TINYINT(1) NOT NULL, s_for_ban VARCHAR(127) DEFAULT NULL, s_separadores VARCHAR(127) DEFAULT NULL, s_apilado VARCHAR(127) DEFAULT NULL, i_uds_planta INT DEFAULT NULL, i_plantas_par SMALLINT NOT NULL, i_plantas_impar SMALLINT NOT NULL, i_peso_par SMALLINT NOT NULL, i_peso_impar SMALLINT NOT NULL, i_cantoneras TINYINT(1) NOT NULL, i_tapado TINYINT(1) NOT NULL, i_alt_par SMALLINT NOT NULL, i_alt_impar SMALLINT NOT NULL, mt_otros_gra LONGTEXT DEFAULT NULL, s_dimension_caja VARCHAR(127) DEFAULT NULL, i_uds_caja SMALLINT NOT NULL, i_cajas_planta SMALLINT NOT NULL, mt_otros_caj LONGTEXT DEFAULT NULL, s_dir1 VARCHAR(127) DEFAULT NULL, s_dir2 VARCHAR(127) DEFAULT NULL, s_dir3 VARCHAR(127) DEFAULT NULL, s_dir4 VARCHAR(127) DEFAULT NULL, s_dir5 VARCHAR(127) DEFAULT NULL, s_dir6 VARCHAR(127) DEFAULT NULL, i_eti_x_caja TINYINT(1) NOT NULL, n_kg_x_caja SMALLINT NOT NULL, i_eti_defecto TINYINT(1) NOT NULL, i_activo TINYINT(1) NOT NULL, i_lote TINYINT(1) NOT NULL, idsemi_pedido INT NOT NULL, n_peso_palet DOUBLE PRECISION NOT NULL, valor DOUBLE PRECISION NOT NULL, i_extranjero TINYINT(1) NOT NULL, manod DOUBLE PRECISION NOT NULL, venta DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE trabajo');
    }
}
