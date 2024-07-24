<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723183031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD taille VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD temperature VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD fréquence_cardiaque VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD tension VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD fréquence_respiratoire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD diurese VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation RENAME COLUMN constantes TO poids');
        $this->addSql('ALTER TABLE rdv DROP CONSTRAINT fk_10c31f866b899279');
        $this->addSql('ALTER TABLE rdv DROP CONSTRAINT fk_10c31f8627b4febf');
        $this->addSql('ALTER TABLE rdv DROP CONSTRAINT fk_10c31f8662ff6cdf');
        $this->addSql('DROP INDEX idx_10c31f8662ff6cdf');
        $this->addSql('DROP INDEX idx_10c31f8627b4febf');
        $this->addSql('DROP INDEX idx_10c31f866b899279');
        $this->addSql('ALTER TABLE rdv DROP patient_id');
        $this->addSql('ALTER TABLE rdv DROP caisse_id');
        $this->addSql('ALTER TABLE rdv DROP consultation_id');
        $this->addSql('ALTER TABLE soins ADD pression_artérielle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE soins ADD température VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE soins ADD fréquence_respiratoire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE soins ADD diurèse VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE soins RENAME COLUMN constante TO frequence_cardiaque');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE soins ADD constante VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE soins DROP frequence_cardiaque');
        $this->addSql('ALTER TABLE soins DROP pression_artérielle');
        $this->addSql('ALTER TABLE soins DROP température');
        $this->addSql('ALTER TABLE soins DROP fréquence_respiratoire');
        $this->addSql('ALTER TABLE soins DROP diurèse');
        $this->addSql('ALTER TABLE consultation ADD constantes VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultation DROP poids');
        $this->addSql('ALTER TABLE consultation DROP taille');
        $this->addSql('ALTER TABLE consultation DROP temperature');
        $this->addSql('ALTER TABLE consultation DROP fréquence_cardiaque');
        $this->addSql('ALTER TABLE consultation DROP tension');
        $this->addSql('ALTER TABLE consultation DROP fréquence_respiratoire');
        $this->addSql('ALTER TABLE consultation DROP diurese');
        $this->addSql('ALTER TABLE rdv ADD patient_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD caisse_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD consultation_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT fk_10c31f866b899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT fk_10c31f8627b4febf FOREIGN KEY (caisse_id) REFERENCES caisse (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT fk_10c31f8662ff6cdf FOREIGN KEY (consultation_id) REFERENCES consultation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_10c31f8662ff6cdf ON rdv (consultation_id)');
        $this->addSql('CREATE INDEX idx_10c31f8627b4febf ON rdv (caisse_id)');
        $this->addSql('CREATE INDEX idx_10c31f866b899279 ON rdv (patient_id)');
    }
}
