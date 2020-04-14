<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414155501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_project (client_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_7D8E949319EB6921 (client_id), INDEX IDX_7D8E9493166D1F9C (project_id), PRIMARY KEY(client_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EEF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subzone (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, INDEX IDX_795EB28C9F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subzone_service (subzone_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_E4ED5E8AD44E9764 (subzone_id), INDEX IDX_E4ED5E8AED5CA9E6 (service_id), PRIMARY KEY(subzone_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone_service (zone_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_5FA999EA9F2C3FAB (zone_id), INDEX IDX_5FA999EAED5CA9E6 (service_id), PRIMARY KEY(zone_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_project ADD CONSTRAINT FK_7D8E949319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_project ADD CONSTRAINT FK_7D8E9493166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE subzone ADD CONSTRAINT FK_795EB28C9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE subzone_service ADD CONSTRAINT FK_E4ED5E8AD44E9764 FOREIGN KEY (subzone_id) REFERENCES subzone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subzone_service ADD CONSTRAINT FK_E4ED5E8AED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_service ADD CONSTRAINT FK_5FA999EA9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_service ADD CONSTRAINT FK_5FA999EAED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEF5B7AF75');
        $this->addSql('ALTER TABLE client_project DROP FOREIGN KEY FK_7D8E9493166D1F9C');
        $this->addSql('ALTER TABLE subzone_service DROP FOREIGN KEY FK_E4ED5E8AED5CA9E6');
        $this->addSql('ALTER TABLE zone_service DROP FOREIGN KEY FK_5FA999EAED5CA9E6');
        $this->addSql('ALTER TABLE subzone_service DROP FOREIGN KEY FK_E4ED5E8AD44E9764');
        $this->addSql('ALTER TABLE subzone DROP FOREIGN KEY FK_795EB28C9F2C3FAB');
        $this->addSql('ALTER TABLE zone_service DROP FOREIGN KEY FK_5FA999EA9F2C3FAB');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE client_project');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE subzone');
        $this->addSql('DROP TABLE subzone_service');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE zone_service');
    }
}
