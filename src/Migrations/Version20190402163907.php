<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190402163907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, INDEX IDX_C4EC16CEDE734E51 (cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE codigo_s CHANGE s_semi s_semi VARCHAR(127) DEFAULT NULL, CHANGE idpedido pedido_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE codigo_s ADD CONSTRAINT FK_50AA3EF74854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('CREATE INDEX IDX_50AA3EF74854653A ON codigo_s (pedido_id)');
        $this->addSql('ALTER TABLE codigo_p ADD pedido_id INT DEFAULT NULL, ADD s_trabajo VARCHAR(127) DEFAULT NULL, ADD idpack_list INT DEFAULT NULL, ADD i_impar TINYINT(1) DEFAULT NULL, ADD i_unidades INT NOT NULL, ADD i_peso SMALLINT DEFAULT NULL, ADD d_fecha_exp DATE DEFAULT NULL, ADD t_changed DATETIME DEFAULT NULL, ADD i_changed INT DEFAULT NULL, ADD t_added DATETIME NOT NULL, ADD i_added INT DEFAULT NULL, ADD i_lote INT DEFAULT NULL, ADD n_peso_palet DOUBLE PRECISION DEFAULT NULL, ADD s_dir1 VARCHAR(63) DEFAULT NULL, ADD s_dir2 VARCHAR(63) DEFAULT NULL, ADD s_dir3 VARCHAR(63) DEFAULT NULL, ADD s_dir4 VARCHAR(63) DEFAULT NULL, ADD s_dir5 VARCHAR(63) DEFAULT NULL, ADD s_dir6 VARCHAR(63) DEFAULT NULL, ADD s_orden_de_compra VARCHAR(31) DEFAULT NULL, ADD s_cod_art VARCHAR(31) DEFAULT NULL, ADD valor DOUBLE PRECISION DEFAULT NULL, ADD cerrado TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE codigo_p ADD CONSTRAINT FK_C9A36F4D4854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('CREATE INDEX IDX_C9A36F4D4854653A ON codigo_p (pedido_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE codigo_s DROP FOREIGN KEY FK_50AA3EF74854653A');
        $this->addSql('ALTER TABLE codigo_p DROP FOREIGN KEY FK_C9A36F4D4854653A');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP INDEX IDX_C9A36F4D4854653A ON codigo_p');
        $this->addSql('ALTER TABLE codigo_p DROP pedido_id, DROP s_trabajo, DROP idpack_list, DROP i_impar, DROP i_unidades, DROP i_peso, DROP d_fecha_exp, DROP t_changed, DROP i_changed, DROP t_added, DROP i_added, DROP i_lote, DROP n_peso_palet, DROP s_dir1, DROP s_dir2, DROP s_dir3, DROP s_dir4, DROP s_dir5, DROP s_dir6, DROP s_orden_de_compra, DROP s_cod_art, DROP valor, DROP cerrado');
        $this->addSql('DROP INDEX IDX_50AA3EF74854653A ON codigo_s');
        $this->addSql('ALTER TABLE codigo_s CHANGE s_semi s_semi VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE pedido_id idpedido INT DEFAULT NULL');
    }
}
