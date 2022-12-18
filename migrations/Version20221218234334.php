<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221218234334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B638805AB2F');
        $this->addSql('DROP INDEX IDX_C1765B638805AB2F ON departement');
        $this->addSql('ALTER TABLE departement DROP annonce_id');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176CCF9E01E');
        $this->addSql('DROP INDEX IDX_F62F176CCF9E01E ON region');
        $this->addSql('ALTER TABLE region DROP departement_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departement ADD annonce_id INT NOT NULL');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B638805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_C1765B638805AB2F ON departement (annonce_id)');
        $this->addSql('ALTER TABLE region ADD departement_id INT NOT NULL');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('CREATE INDEX IDX_F62F176CCF9E01E ON region (departement_id)');
    }
}
