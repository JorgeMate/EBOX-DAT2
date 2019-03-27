<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327193849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE carpeta_semi');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carpeta_semi (carpeta_id INT NOT NULL, semi_id INT NOT NULL, INDEX IDX_9D30B3B2A6599C76 (semi_id), INDEX IDX_9D30B3B2DEAE5086 (carpeta_id), PRIMARY KEY(carpeta_id, semi_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE carpeta_semi ADD CONSTRAINT FK_9D30B3B2A6599C76 FOREIGN KEY (semi_id) REFERENCES semi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carpeta_semi ADD CONSTRAINT FK_9D30B3B2DEAE5086 FOREIGN KEY (carpeta_id) REFERENCES carpeta (id) ON DELETE CASCADE');
    }
}
