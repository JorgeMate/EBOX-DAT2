<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327191753 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE semi (id INT AUTO_INCREMENT NOT NULL, s_semi VARCHAR(127) NOT NULL, i_externo TINYINT(1) NOT NULL, i_en_cajas TINYINT(1) NOT NULL, i_uds_caja SMALLINT NOT NULL, i_cajas_palet SMALLINT NOT NULL, i_uds_palet SMALLINT NOT NULL, s_especificaciones VARCHAR(127) DEFAULT NULL, t_changed DATETIME DEFAULT NULL, i_changed INT DEFAULT NULL, t_added DATETIME DEFAULT NULL, i_added INT DEFAULT NULL, mt_notas LONGTEXT DEFAULT NULL, i_activo TINYINT(1) NOT NULL, i_lito_lote TINYINT(1) NOT NULL, generico TINYINT(1) NOT NULL, stock INT NOT NULL, stock_min INT NOT NULL, valor DOUBLE PRECISION NOT NULL, i_forzar_lote TINYINT(1) NOT NULL, s_lote VARCHAR(63) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE semi');
    }
}
