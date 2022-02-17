<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217201420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3131A4F72');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3B2B59251');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3924DD2B5');
        $this->addSql('DROP INDEX IDX_1D1C63B3924DD2B5 ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3131A4F72 ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3B2B59251 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD username VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP code_postal_id, DROP localite_id, DROP commune_id, CHANGE nbessaisinfructueux nbessaisinfructueux INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F85E0677 ON utilisateur (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1D1C63B3F85E0677 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD code_postal_id INT DEFAULT NULL, ADD localite_id INT DEFAULT NULL, ADD commune_id INT DEFAULT NULL, DROP username, DROP roles, DROP password, CHANGE nbessaisinfructueux nbessaisinfructueux INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3B2B59251 FOREIGN KEY (code_postal_id) REFERENCES code_postal (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3924DD2B5 ON utilisateur (localite_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3131A4F72 ON utilisateur (commune_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3B2B59251 ON utilisateur (code_postal_id)');
    }
}
