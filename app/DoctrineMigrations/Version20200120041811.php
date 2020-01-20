<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20200120041811 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_D2B7603F132696E ON przystanek');
        $this->addSql('ALTER TABLE przystanek CHANGE zdjecie1 zdjecie1 VARCHAR(1024) DEFAULT NULL, CHANGE zdjecie2 zdjecie2 VARCHAR(1024) DEFAULT NULL, CHANGE zdjecie3 zdjecie3 VARCHAR(1024) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE przystanek CHANGE zdjecie1 zdjecie1 VARCHAR(1024) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE zdjecie2 zdjecie2 VARCHAR(1024) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE zdjecie3 zdjecie3 VARCHAR(1024) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D2B7603F132696E ON przystanek (userid)');
    }
}
