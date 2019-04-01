<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190331230509 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE codigo_s (id INT AUTO_INCREMENT NOT NULL, semi_id INT NOT NULL, c_origen VARCHAR(1) DEFAULT NULL, i_externo TINYINT(1) DEFAULT NULL, s_codigo VARCHAR(16) NOT NULL, s_externo VARCHAR(32) NOT NULL, i_loc SMALLINT DEFAULT NULL, i_unidades INT NOT NULL, i_uds_tomadas INT DEFAULT NULL, dt_consumo DATETIME DEFAULT NULL, t_changed DATETIME DEFAULT NULL, t_added DATETIME DEFAULT NULL, i_added INT DEFAULT NULL, s_notas VARCHAR(128) DEFAULT NULL, idpedido INT DEFAULT NULL, s_semi VARCHAR(64) DEFAULT NULL, valor DOUBLE PRECISION DEFAULT NULL, idpack_list INT DEFAULT NULL, INDEX IDX_50AA3EF7A6599C76 (semi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE codigo_s ADD CONSTRAINT FK_50AA3EF7A6599C76 FOREIGN KEY (semi_id) REFERENCES semi (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE codigo_s');
    }
}
