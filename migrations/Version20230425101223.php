<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425101223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1588EB7468');
        $this->addSql('DROP INDEX IDX_2449BA1588EB7468 ON equipe');
        $this->addSql('ALTER TABLE equipe ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP matchs_id');
        $this->addSql('ALTER TABLE matchs ADD equipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E60416D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_6B1E60416D861B89 ON matchs (equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe ADD matchs_id INT NOT NULL, DROP email, DROP password');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1588EB7468 FOREIGN KEY (matchs_id) REFERENCES matchs (id)');
        $this->addSql('CREATE INDEX IDX_2449BA1588EB7468 ON equipe (matchs_id)');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E60416D861B89');
        $this->addSql('DROP INDEX IDX_6B1E60416D861B89 ON matchs');
        $this->addSql('ALTER TABLE matchs DROP equipe_id');
    }
}
