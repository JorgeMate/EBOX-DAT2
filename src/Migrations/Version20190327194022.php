<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327194022 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trabajo_semi (trabajo_id INT NOT NULL, semi_id INT NOT NULL, INDEX IDX_15AACD0E287A134A (trabajo_id), INDEX IDX_15AACD0EA6599C76 (semi_id), PRIMARY KEY(trabajo_id, semi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trabajo_semi ADD CONSTRAINT FK_15AACD0E287A134A FOREIGN KEY (trabajo_id) REFERENCES trabajo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trabajo_semi ADD CONSTRAINT FK_15AACD0EA6599C76 FOREIGN KEY (semi_id) REFERENCES semi (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE trabajo_semi');
    }
}
