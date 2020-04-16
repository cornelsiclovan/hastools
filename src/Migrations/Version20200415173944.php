<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415173944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE configuration ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D7166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A5E2A5D7166D1F9C ON configuration (project_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D7166D1F9C');
        $this->addSql('DROP INDEX UNIQ_A5E2A5D7166D1F9C ON configuration');
        $this->addSql('ALTER TABLE configuration DROP project_id');
    }
}
