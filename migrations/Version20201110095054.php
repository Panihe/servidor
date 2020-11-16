<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110095054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoria CHANGE nombre categoria VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E6763C8AA7');
        $this->addSql('DROP INDEX IDX_767490E6763C8AA7 ON productos');
        $this->addSql('ALTER TABLE productos ADD imagen VARCHAR(50) NOT NULL, DROP imagen_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoria CHANGE categoria nombre VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE productos ADD imagen_id INT DEFAULT NULL, DROP imagen');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E6763C8AA7 FOREIGN KEY (imagen_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_767490E6763C8AA7 ON productos (imagen_id)');
    }
}
