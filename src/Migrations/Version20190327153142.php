<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327153142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE formato (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(127) NOT NULL, activo TINYINT(1) NOT NULL, notas LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_19BDE6735E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarea (id INT AUTO_INCREMENT NOT NULL, tarea VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, cod_conta VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_F41C9B255E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carpeta (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, formato_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, activa TINYINT(1) NOT NULL, ano SMALLINT NOT NULL, INDEX IDX_334DA23DDE734E51 (cliente_id), INDEX IDX_334DA23D8D02887B (formato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operario (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(127) NOT NULL, iname SMALLINT NOT NULL, activo TINYINT(1) NOT NULL, planta TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E677106C5E237E06 (name), UNIQUE INDEX UNIQ_E677106C2D67433B (iname), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tareasub (id INT AUTO_INCREMENT NOT NULL, tarea_id INT NOT NULL, tareasub VARCHAR(64) NOT NULL, INDEX IDX_5318980D6D5BDFE1 (tarea_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carpeta ADD CONSTRAINT FK_334DA23DDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE carpeta ADD CONSTRAINT FK_334DA23D8D02887B FOREIGN KEY (formato_id) REFERENCES formato (id)');
        $this->addSql('ALTER TABLE tareasub ADD CONSTRAINT FK_5318980D6D5BDFE1 FOREIGN KEY (tarea_id) REFERENCES tarea (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carpeta DROP FOREIGN KEY FK_334DA23D8D02887B');
        $this->addSql('ALTER TABLE tareasub DROP FOREIGN KEY FK_5318980D6D5BDFE1');
        $this->addSql('ALTER TABLE carpeta DROP FOREIGN KEY FK_334DA23DDE734E51');
        $this->addSql('DROP TABLE formato');
        $this->addSql('DROP TABLE tarea');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE carpeta');
        $this->addSql('DROP TABLE operario');
        $this->addSql('DROP TABLE tareasub');
        $this->addSql('DROP TABLE user');
    }
}
