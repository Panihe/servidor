<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110084207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E6C09A1CAE');
        $this->addSql('DROP INDEX IDX_767490E6C09A1CAE ON productos');
        $this->addSql('ALTER TABLE productos ADD categoria_id INT DEFAULT NULL, DROP imagen, CHANGE id_cat_id imagen_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E6763C8AA7 FOREIGN KEY (imagen_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E63397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_767490E6763C8AA7 ON productos (imagen_id)');
        $this->addSql('CREATE INDEX IDX_767490E63397707A ON productos (categoria_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E6763C8AA7');
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E63397707A');
        $this->addSql('DROP INDEX IDX_767490E6763C8AA7 ON productos');
        $this->addSql('DROP INDEX IDX_767490E63397707A ON productos');
        $this->addSql('ALTER TABLE productos ADD id_cat_id INT DEFAULT NULL, ADD imagen VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP imagen_id, DROP categoria_id');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E6C09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_767490E6C09A1CAE ON productos (id_cat_id)');
    }
}
