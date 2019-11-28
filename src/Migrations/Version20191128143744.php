<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191128143744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lending ADD riser_id INT DEFAULT NULL, ADD jumping_tilt_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03112BB3D5 FOREIGN KEY (riser_id) REFERENCES riser (id)');
        $this->addSql('ALTER TABLE lending ADD CONSTRAINT FK_74AB8C03B74B5798 FOREIGN KEY (jumping_tilt_id) REFERENCES jumping_tilt (id)');
        $this->addSql('CREATE INDEX IDX_74AB8C03112BB3D5 ON lending (riser_id)');
        $this->addSql('CREATE INDEX IDX_74AB8C03B74B5798 ON lending (jumping_tilt_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C03112BB3D5');
        $this->addSql('ALTER TABLE lending DROP FOREIGN KEY FK_74AB8C03B74B5798');
        $this->addSql('DROP INDEX IDX_74AB8C03112BB3D5 ON lending');
        $this->addSql('DROP INDEX IDX_74AB8C03B74B5798 ON lending');
        $this->addSql('ALTER TABLE lending DROP riser_id, DROP jumping_tilt_id');
    }
}
