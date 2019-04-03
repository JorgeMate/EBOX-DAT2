<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190403182857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE codigo_p CHANGE s_codigo s_codigo VARCHAR(10) NOT NULL COMMENT \'El código de palet tiene que ser único\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C9A36F4D3915C7E ON codigo_p (s_codigo)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_C9A36F4D3915C7E ON codigo_p');
        $this->addSql('ALTER TABLE codigo_p CHANGE s_codigo s_codigo VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
