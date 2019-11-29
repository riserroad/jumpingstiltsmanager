<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191130093407 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE repair_commentary (id INT AUTO_INCREMENT NOT NULL, jumping_tilt_id INT NOT NULL, repair_date DATE NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_7886D7E8B74B5798 (jumping_tilt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riser (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lending (id INT AUTO_INCREMENT NOT NULL, riser_id INT NOT NULL, jumping_tilt_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_74AB8C03112BB3D5 (riser_id), INDEX IDX_74AB8C03B74B5798 (jumping_tilt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jumping_tilt (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, state_id INT NOT NULL, reference VARCHAR(5) NOT NULL, description LONGTEXT NOT NULL, weight INT DEFAULT NULL, INDEX IDX_649B4D9812469DE2 (category_id), INDEX IDX_649B4D985D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_commentary ADD CONSTRAINT FK_7886D7E8B74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03112BB3D5 FOREIGN KEY (riser_id) REFERENCES riser (id)');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03B74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D985D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C03112BB3D5');
        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D9812469DE2');
        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D985D83CC1');
        $this->addSql('ALTER TABLE repair_commentary DROP FOREIGN KEY FK_7886D7E8B74B5798');
        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C03B74B5798');
        $this->addSql('DROP TABLE repair_commentary');
        $this->addSql('DROP TABLE riser');
        $this->addSql('DROP TABLE lending');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE jumping_tilt');
    }
}
