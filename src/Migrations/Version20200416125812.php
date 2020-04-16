<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416125812 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE configuration ADD service_id INT DEFAULT NULL, ADD subservice_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D7ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D7B2CD4E45 FOREIGN KEY (subservice_id) REFERENCES subservice (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D7C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_A5E2A5D7ED5CA9E6 ON configuration (service_id)');
        $this->addSql('CREATE INDEX IDX_A5E2A5D7B2CD4E45 ON configuration (subservice_id)');
        $this->addSql('CREATE INDEX IDX_A5E2A5D7C54C8C93 ON configuration (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D7ED5CA9E6');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D7B2CD4E45');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D7C54C8C93');
        $this->addSql('DROP INDEX IDX_A5E2A5D7ED5CA9E6 ON configuration');
        $this->addSql('DROP INDEX IDX_A5E2A5D7B2CD4E45 ON configuration');
        $this->addSql('DROP INDEX IDX_A5E2A5D7C54C8C93 ON configuration');
        $this->addSql('ALTER TABLE configuration DROP service_id, DROP subservice_id, DROP type_id');
    }
}
