<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190402155316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE codigo_p (id INT AUTO_INCREMENT NOT NULL, trabajo_id INT NOT NULL, c_origen VARCHAR(1) DEFAULT NULL, i_completo TINYINT(1) DEFAULT NULL, i_externo TINYINT(1) DEFAULT NULL, s_codigo VARCHAR(10) NOT NULL, s_externo VARCHAR(32) DEFAULT NULL, i_loc SMALLINT DEFAULT NULL, INDEX IDX_C9A36F4D287A134A (trabajo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE codigo_p ADD CONSTRAINT FK_C9A36F4D287A134A FOREIGN KEY (trabajo_id) REFERENCES trabajo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE codigo_p');
    }
}
