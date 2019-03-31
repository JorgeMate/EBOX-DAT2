<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190331161411 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE semi CHANGE i_lito_lote i_lito_lote TINYINT(1) DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE stock_min stock_min INT DEFAULT NULL, CHANGE valor valor DOUBLE PRECISION DEFAULT NULL, CHANGE i_forzar_lote i_forzar_lote TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE trabajo_semi DROP uds_x_sem');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE semi CHANGE i_lito_lote i_lito_lote TINYINT(1) NOT NULL, CHANGE stock stock INT NOT NULL, CHANGE stock_min stock_min INT NOT NULL, CHANGE valor valor DOUBLE PRECISION NOT NULL, CHANGE i_forzar_lote i_forzar_lote TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE trabajo_semi ADD uds_x_sem INT DEFAULT NULL');
    }
}
