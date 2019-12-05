<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191205214125 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE storage_area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lending_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model_jumping_stilt (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubber (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lending ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C036BF700BD FOREIGN KEY (status_id) REFERENCES lending_status (id)');
        $this->addSql('CREATE INDEX IDX_74AB8C036BF700BD ON lending (status_id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD rubber_id INT NOT NULL, ADD storage_area_id INT NOT NULL, ADD model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D988C1D1F9C FOREIGN KEY (rubber_id) REFERENCES rubber (id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D98CA3373FE FOREIGN KEY (storage_area_id) REFERENCES storage_area (id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D987975B7E7 FOREIGN KEY (model_id) REFERENCES model_jumping_stilt (id)');
        $this->addSql('CREATE INDEX IDX_649B4D988C1D1F9C ON jumping_tilt (rubber_id)');
        $this->addSql('CREATE INDEX IDX_649B4D98CA3373FE ON jumping_tilt (storage_area_id)');
        $this->addSql('CREATE INDEX IDX_649B4D987975B7E7 ON jumping_tilt (model_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D98CA3373FE');
        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C036BF700BD');
        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D987975B7E7');
        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D988C1D1F9C');
        $this->addSql('DROP TABLE storage_area');
        $this->addSql('DROP TABLE lending_status');
        $this->addSql('DROP TABLE model_jumping_stilt');
        $this->addSql('DROP TABLE rubber');
        $this->addSql('DROP INDEX IDX_649B4D988C1D1F9C ON jumping_tilt');
        $this->addSql('DROP INDEX IDX_649B4D98CA3373FE ON jumping_tilt');
        $this->addSql('DROP INDEX IDX_649B4D987975B7E7 ON jumping_tilt');
        $this->addSql('ALTER TABLE jumping_tilt DROP rubber_id, DROP storage_area_id, DROP model_id');
        $this->addSql('DROP INDEX IDX_74AB8C036BF700BD ON lending');
        $this->addSql('ALTER TABLE lending DROP status_id');
    }
}
