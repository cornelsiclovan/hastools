<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415171026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE subservice_type (subservice_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_F9D924A5B2CD4E45 (subservice_id), INDEX IDX_F9D924A5C54C8C93 (type_id), PRIMARY KEY(subservice_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subservice_type ADD CONSTRAINT FK_F9D924A5B2CD4E45 FOREIGN KEY (subservice_id) REFERENCES subservice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subservice_type ADD CONSTRAINT FK_F9D924A5C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE subservice_type');
    }
}
