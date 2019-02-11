<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190211214504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DA76ED395');
        $this->addSql('CREATE TABLE lending (id INT AUTO_INCREMENT NOT NULL, jumping_tilt_id INT NOT NULL, riser_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, UNIQUE INDEX UNIQ_74AB8C03B74B5798 (jumping_tilt_id), INDEX IDX_74AB8C03112BB3D5 (riser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riser (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03B74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03112BB3D5 FOREIGN KEY (riser_id) REFERENCES riser (id)');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE state CHANGE state name VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_649B4D98AEA34913 ON jumping_tilt');
        $this->addSql('ALTER TABLE jumping_tilt CHANGE comment description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE category CHANGE category name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C03112BB3D5');
        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, jumping_tilt_id INT NOT NULL, user_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_1619C27DA76ED395 (user_id), UNIQUE INDEX UNIQ_1619C27DB74B5798 (jumping_tilt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, lastname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DB74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
        $this->addSql('DROP TABLE lending');
        $this->addSql('DROP TABLE riser');
        $this->addSql('ALTER TABLE category CHANGE name category VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE jumping_tilt CHANGE description comment LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_649B4D98AEA34913 ON jumping_tilt (reference)');
        $this->addSql('ALTER TABLE state CHANGE name state VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
