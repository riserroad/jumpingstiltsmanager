<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190211205736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, jumping_tilt_id INT NOT NULL, user_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, UNIQUE INDEX UNIQ_1619C27DB74B5798 (jumping_tilt_id), INDEX IDX_1619C27DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_AD8A54A9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jumping_tilt (id INT AUTO_INCREMENT NOT NULL, state_id INT NOT NULL, category_id INT NOT NULL, reference VARCHAR(5) NOT NULL, weight INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_649B4D98AEA34913 (reference), INDEX IDX_649B4D985D83CC1 (state_id), INDEX IDX_649B4D9812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_commentary (id INT AUTO_INCREMENT NOT NULL, jumping_tilt_id INT NOT NULL, repair_date DATE NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_7886D7E8B74B5798 (jumping_tilt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DB74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D985D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE jumping_tilt ADD CONSTRAINT FK_649B4D9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE repair_commentary ADD CONSTRAINT FK_7886D7E8B74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D985D83CC1');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DA76ED395');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DB74B5798');
        $this->addSql('ALTER TABLE repair_commentary DROP FOREIGN KEY FK_7886D7E8B74B5798');
        $this->addSql('ALTER TABLE jumping_tilt DROP FOREIGN KEY FK_649B4D9812469DE2');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE admin_user');
        $this->addSql('DROP TABLE jumping_tilt');
        $this->addSql('DROP TABLE repair_commentary');
        $this->addSql('DROP TABLE category');
    }
}
