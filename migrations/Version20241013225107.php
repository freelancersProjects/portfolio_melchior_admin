<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241013225107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE t_artwork (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, main_image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date DATE NOT NULL, image_1 VARCHAR(255) NOT NULL, image_2 VARCHAR(255) NOT NULL, image_3 VARCHAR(255) NOT NULL, filter_id INT DEFAULT NULL, INDEX IDX_D2337D15D395B25E (filter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE t_artwork ADD CONSTRAINT FK_D2337D15D395B25E FOREIGN KEY (filter_id) REFERENCES t_filter (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE t_artwork DROP FOREIGN KEY FK_D2337D15D395B25E');
        $this->addSql('DROP TABLE t_artwork');
    }
}
