<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203180710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internaute_bloc (internaute_id INT NOT NULL, bloc_id INT NOT NULL, INDEX IDX_B4CC2BA7CAF41882 (internaute_id), INDEX IDX_B4CC2BA75582E9C0 (bloc_id), PRIMARY KEY(internaute_id, bloc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internaute_prestataire (internaute_id INT NOT NULL, prestataire_id INT NOT NULL, INDEX IDX_D906EC3ACAF41882 (internaute_id), INDEX IDX_D906EC3ABE3DB2B7 (prestataire_id), PRIMARY KEY(internaute_id, prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_categorie_de_services (prestataire_id INT NOT NULL, categorie_de_services_id INT NOT NULL, INDEX IDX_603DD9ABBE3DB2B7 (prestataire_id), INDEX IDX_603DD9AB4A81A587 (categorie_de_services_id), PRIMARY KEY(prestataire_id, categorie_de_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE internaute_bloc ADD CONSTRAINT FK_B4CC2BA7CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_bloc ADD CONSTRAINT FK_B4CC2BA75582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_prestataire ADD CONSTRAINT FK_D906EC3ACAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_prestataire ADD CONSTRAINT FK_D906EC3ABE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_de_services ADD CONSTRAINT FK_603DD9ABBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_de_services ADD CONSTRAINT FK_603DD9AB4A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abus ADD commentaire_id INT NOT NULL, ADD internaute_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('CREATE INDEX IDX_72C9FD01BA9CD190 ON abus (commentaire_id)');
        $this->addSql('CREATE INDEX IDX_72C9FD01CAF41882 ON abus (internaute_id)');
        $this->addSql('ALTER TABLE categorie_de_services ADD images_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_de_services ADD CONSTRAINT FK_D8410DCCD44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8410DCCD44F05E5 ON categorie_de_services (images_id)');
        $this->addSql('ALTER TABLE commentaire ADD internaute_id INT DEFAULT NULL, ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCCAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCCAF41882 ON commentaire (internaute_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCBE3DB2B7 ON commentaire (prestataire_id)');
        $this->addSql('ALTER TABLE images ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ABE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6ABE3DB2B7 ON images (prestataire_id)');
        $this->addSql('ALTER TABLE internaute ADD images_id INT DEFAULT NULL, ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCD44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C8E97CCD44F05E5 ON internaute (images_id)');
        $this->addSql('CREATE INDEX IDX_6C8E97CCFB88E14F ON internaute (utilisateur_id)');
        $this->addSql('ALTER TABLE prestataire ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_60A26480FB88E14F ON prestataire (utilisateur_id)');
        $this->addSql('ALTER TABLE promotion ADD prestataire_id INT DEFAULT NULL, ADD categorie_de_services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD14A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1BE3DB2B7 ON promotion (prestataire_id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD14A81A587 ON promotion (categorie_de_services_id)');
        $this->addSql('ALTER TABLE stage ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369BE3DB2B7 ON stage (prestataire_id)');
        $this->addSql('ALTER TABLE utilisateur ADD code_postal_id INT DEFAULT NULL, ADD localite_id INT DEFAULT NULL, ADD commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3B2B59251 FOREIGN KEY (code_postal_id) REFERENCES code_postal (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3B2B59251 ON utilisateur (code_postal_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3924DD2B5 ON utilisateur (localite_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3131A4F72 ON utilisateur (commune_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE internaute_bloc');
        $this->addSql('DROP TABLE internaute_prestataire');
        $this->addSql('DROP TABLE prestataire_categorie_de_services');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01BA9CD190');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01CAF41882');
        $this->addSql('DROP INDEX IDX_72C9FD01BA9CD190 ON abus');
        $this->addSql('DROP INDEX IDX_72C9FD01CAF41882 ON abus');
        $this->addSql('ALTER TABLE abus DROP commentaire_id, DROP internaute_id');
        $this->addSql('ALTER TABLE categorie_de_services DROP FOREIGN KEY FK_D8410DCCD44F05E5');
        $this->addSql('DROP INDEX UNIQ_D8410DCCD44F05E5 ON categorie_de_services');
        $this->addSql('ALTER TABLE categorie_de_services DROP images_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCCAF41882');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBE3DB2B7');
        $this->addSql('DROP INDEX IDX_67F068BCCAF41882 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BCBE3DB2B7 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP internaute_id, DROP prestataire_id');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ABE3DB2B7');
        $this->addSql('DROP INDEX IDX_E01FBE6ABE3DB2B7 ON images');
        $this->addSql('ALTER TABLE images DROP prestataire_id');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCD44F05E5');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCFB88E14F');
        $this->addSql('DROP INDEX UNIQ_6C8E97CCD44F05E5 ON internaute');
        $this->addSql('DROP INDEX IDX_6C8E97CCFB88E14F ON internaute');
        $this->addSql('ALTER TABLE internaute DROP images_id, DROP utilisateur_id');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('DROP INDEX IDX_60A26480FB88E14F ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP utilisateur_id');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1BE3DB2B7');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD14A81A587');
        $this->addSql('DROP INDEX IDX_C11D7DD1BE3DB2B7 ON promotion');
        $this->addSql('DROP INDEX IDX_C11D7DD14A81A587 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP prestataire_id, DROP categorie_de_services_id');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('DROP INDEX IDX_C27C9369BE3DB2B7 ON stage');
        $this->addSql('ALTER TABLE stage DROP prestataire_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3B2B59251');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3924DD2B5');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3131A4F72');
        $this->addSql('DROP INDEX IDX_1D1C63B3B2B59251 ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3924DD2B5 ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3131A4F72 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP code_postal_id, DROP localite_id, DROP commune_id');
    }
}
