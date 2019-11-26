<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126155118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE riser_lending (riser_id INT NOT NULL, lending_id INT NOT NULL, INDEX IDX_8BBD7B56112BB3D5 (riser_id), INDEX IDX_8BBD7B56B235D63A (lending_id), PRIMARY KEY(riser_id, lending_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jumping_tilt_lending (jumping_tilt_id INT NOT NULL, lending_id INT NOT NULL, INDEX IDX_C249E18EB74B5798 (jumping_tilt_id), INDEX IDX_C249E18EB235D63A (lending_id), PRIMARY KEY(jumping_tilt_id, lending_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE riser_lending ADD CONSTRAINT FK_8BBD7B56112BB3D5 FOREIGN KEY (riser_id) REFERENCES riser (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE riser_lending ADD CONSTRAINT FK_8BBD7B56B235D63A FOREIGN KEY (lending_id) REFERENCES lending (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jumping_tilt_lending ADD CONSTRAINT FK_C249E18EB74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jumping_tilt_lending ADD CONSTRAINT FK_C249E18EB235D63A FOREIGN KEY (lending_id) REFERENCES lending (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE lending_jumping_tilt');
        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C03112BB3D5');
        $this->addSql('DROP INDEX IDX_74AB8C03112BB3D5 ON lending');
        $this->addSql('ALTER TABLE lending DROP riser_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lending_jumping_tilt (lending_id INT NOT NULL, jumping_tilt_id INT NOT NULL, INDEX IDX_CB397970B235D63A (lending_id), INDEX IDX_CB397970B74B5798 (jumping_tilt_id), PRIMARY KEY(lending_id, jumping_tilt_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lending_jumping_tilt ADD CONSTRAINT FK_CB397970B235D63A FOREIGN KEY (lending_id) REFERENCES lending (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lending_jumping_tilt ADD CONSTRAINT FK_CB397970B74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE riser_lending');
        $this->addSql('DROP TABLE jumping_tilt_lending');
        $this->addSql('ALTER TABLE lending ADD riser_id INT NOT NULL');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03112BB3D5 FOREIGN KEY (riser_id) REFERENCES riser (id)');
        $this->addSql('CREATE INDEX IDX_74AB8C03112BB3D5 ON lending (riser_id)');
    }
}
