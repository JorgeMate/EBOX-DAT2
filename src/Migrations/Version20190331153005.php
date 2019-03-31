<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190331153005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE semi CHANGE i_uds_caja i_uds_caja SMALLINT DEFAULT NULL, CHANGE i_cajas_palet i_cajas_palet SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE trabajo_semi DROP uds_x_sem');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE semi CHANGE i_uds_caja i_uds_caja SMALLINT NOT NULL, CHANGE i_cajas_palet i_cajas_palet SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE trabajo_semi ADD uds_x_sem INT DEFAULT NULL');
    }
}