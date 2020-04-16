<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415164157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE subzone_service');
        $this->addSql('DROP TABLE zone_service');
        $this->addSql('ALTER TABLE zone ADD size VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE subzone_service (subzone_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_E4ED5E8AD44E9764 (subzone_id), INDEX IDX_E4ED5E8AED5CA9E6 (service_id), PRIMARY KEY(subzone_id, service_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE zone_service (zone_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_5FA999EA9F2C3FAB (zone_id), INDEX IDX_5FA999EAED5CA9E6 (service_id), PRIMARY KEY(zone_id, service_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE subzone_service ADD CONSTRAINT FK_E4ED5E8AD44E9764 FOREIGN KEY (subzone_id) REFERENCES subzone (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subzone_service ADD CONSTRAINT FK_E4ED5E8AED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_service ADD CONSTRAINT FK_5FA999EA9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_service ADD CONSTRAINT FK_5FA999EAED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone DROP size');
    }
}
