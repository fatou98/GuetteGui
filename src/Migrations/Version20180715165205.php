<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180715165205 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bergerie (id INT AUTO_INCREMENT NOT NULL, berger_id INT NOT NULL, libelle VARCHAR(100) NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_91F0E24C6B7561BB (berger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bete (id INT AUTO_INCREMENT NOT NULL, bergerie_id INT NOT NULL, race_id INT NOT NULL, nomcomplet VARCHAR(60) NOT NULL, age VARCHAR(30) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, prix INT NOT NULL, gabari VARCHAR(100) DEFAULT NULL, taille VARCHAR(60) DEFAULT NULL, poids VARCHAR(60) DEFAULT NULL, etat TINYINT(1) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_88FCC07ACE34D277 (bergerie_id), INDEX IDX_88FCC07A6E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, date DATE NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_bete (commande_id INT NOT NULL, bete_id INT NOT NULL, INDEX IDX_E390C19982EA2E54 (commande_id), INDEX IDX_E390C19940D64147 (bete_id), PRIMARY KEY(commande_id, bete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bete_id INT NOT NULL, image LONGBLOB NOT NULL, INDEX IDX_C53D045F40D64147 (bete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, date DATE NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_A60C9F1F82EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bergerie ADD CONSTRAINT FK_91F0E24C6B7561BB FOREIGN KEY (berger_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bete ADD CONSTRAINT FK_88FCC07ACE34D277 FOREIGN KEY (bergerie_id) REFERENCES bergerie (id)');
        $this->addSql('ALTER TABLE bete ADD CONSTRAINT FK_88FCC07A6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande_bete ADD CONSTRAINT FK_E390C19982EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_bete ADD CONSTRAINT FK_E390C19940D64147 FOREIGN KEY (bete_id) REFERENCES bete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F40D64147 FOREIGN KEY (bete_id) REFERENCES bete (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE user CHANGE numpiece numpiece BIGINT NOT NULL, CHANGE tel tel BIGINT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bete DROP FOREIGN KEY FK_88FCC07ACE34D277');
        $this->addSql('ALTER TABLE commande_bete DROP FOREIGN KEY FK_E390C19940D64147');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F40D64147');
        $this->addSql('ALTER TABLE commande_bete DROP FOREIGN KEY FK_E390C19982EA2E54');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F82EA2E54');
        $this->addSql('ALTER TABLE bete DROP FOREIGN KEY FK_88FCC07A6E59D40D');
        $this->addSql('DROP TABLE bergerie');
        $this->addSql('DROP TABLE bete');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_bete');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE race');
        $this->addSql('ALTER TABLE user CHANGE numpiece numpiece INT NOT NULL, CHANGE tel tel INT NOT NULL');
    }
}
