<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325224559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tarea (id INT AUTO_INCREMENT NOT NULL, tarea VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tareasub (id INT AUTO_INCREMENT NOT NULL, tarea_id INT NOT NULL, tareasub VARCHAR(64) NOT NULL, INDEX IDX_5318980D6D5BDFE1 (tarea_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tareasub ADD CONSTRAINT FK_5318980D6D5BDFE1 FOREIGN KEY (tarea_id) REFERENCES tarea (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tareasub DROP FOREIGN KEY FK_5318980D6D5BDFE1');
        $this->addSql('DROP TABLE tarea');
        $this->addSql('DROP TABLE tareasub');
    }
}
