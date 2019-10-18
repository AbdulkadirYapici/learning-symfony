<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191017074059 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_blog DROP FOREIGN KEY category_blog_ibfk_2');
        $this->addSql('ALTER TABLE tag_blog DROP FOREIGN KEY tag_blog_ibfk_2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_blog');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_blog');
        $this->addSql('ALTER TABLE blog ADD name VARCHAR(255) NOT NULL, DROP entry');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, entry VARCHAR(256) COLLATE utf8_turkish_ci, INDEX entry (entry), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(256) NOT NULL COLLATE utf8_turkish_ci, INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category_blog (id INT AUTO_INCREMENT NOT NULL, blog_id INT NOT NULL, category_id INT NOT NULL, UNIQUE INDEX blog_id (blog_id, category_id), INDEX category_id (category_id), INDEX IDX_4B8E2B04DAE07E97 (blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(256) NOT NULL COLLATE utf8_turkish_ci, INDEX text (text), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tag_blog (id INT AUTO_INCREMENT NOT NULL, blog_id INT NOT NULL, tag_id INT NOT NULL, INDEX tag_id (tag_id), INDEX blog_id (blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_blog ADD CONSTRAINT category_blog_ibfk_1 FOREIGN KEY (blog_id) REFERENCES blog (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_blog ADD CONSTRAINT category_blog_ibfk_2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_blog ADD CONSTRAINT tag_blog_ibfk_1 FOREIGN KEY (blog_id) REFERENCES blog (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_blog ADD CONSTRAINT tag_blog_ibfk_2 FOREIGN KEY (tag_id) REFERENCES tag (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
