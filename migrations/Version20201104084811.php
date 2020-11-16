<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201104084811 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE productos ADD id_cat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E6C09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_767490E6C09A1CAE ON productos (id_cat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E6C09A1CAE');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP INDEX IDX_767490E6C09A1CAE ON productos');
        $this->addSql('ALTER TABLE productos DROP id_cat_id');
    }
}
