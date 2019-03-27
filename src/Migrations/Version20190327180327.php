<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327180327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carpeta_trabajo (carpeta_id INT NOT NULL, trabajo_id INT NOT NULL, INDEX IDX_12250678DEAE5086 (carpeta_id), INDEX IDX_12250678287A134A (trabajo_id), PRIMARY KEY(carpeta_id, trabajo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carpeta_trabajo ADD CONSTRAINT FK_12250678DEAE5086 FOREIGN KEY (carpeta_id) REFERENCES carpeta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carpeta_trabajo ADD CONSTRAINT FK_12250678287A134A FOREIGN KEY (trabajo_id) REFERENCES trabajo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE carpeta_trabajo');
    }
}
