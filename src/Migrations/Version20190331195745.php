<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190331195745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE semi ADD id_anterior INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F2EF15B3E90EEC4B ON semi (id_anterior)');
        //$this->addSql('ALTER TABLE trabajo_semi DROP uds_x_sem');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_F2EF15B3E90EEC4B ON semi');
        $this->addSql('ALTER TABLE semi DROP id_anterior');
        $this->addSql('ALTER TABLE trabajo_semi ADD uds_x_sem INT DEFAULT NULL');
    }
}
