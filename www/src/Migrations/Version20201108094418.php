<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201108094418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE copy DROP FOREIGN KEY FK_4DBABB82D0FFFF74');
        $this->addSql('DROP INDEX IDX_4DBABB82D0FFFF74 ON copy');
        $this->addSql('ALTER TABLE copy ADD film_id INT DEFAULT NULL, DROP original_film_id');
        $this->addSql('ALTER TABLE copy ADD CONSTRAINT FK_4DBABB82567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_4DBABB82567F5183 ON copy (film_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE copy DROP FOREIGN KEY FK_4DBABB82567F5183');
        $this->addSql('DROP INDEX IDX_4DBABB82567F5183 ON copy');
        $this->addSql('ALTER TABLE copy ADD original_film_id INT NOT NULL, DROP film_id');
        $this->addSql('ALTER TABLE copy ADD CONSTRAINT FK_4DBABB82D0FFFF74 FOREIGN KEY (original_film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_4DBABB82D0FFFF74 ON copy (original_film_id)');
    }
}
