UPDATE ezsite_data SET value='3.7.7' WHERE name='ezpublish-version';
UPDATE ezsite_data SET value='10' WHERE name='ezpublish-release';

CREATE INDEX ezkeyword_keyword_id ON ezkeyword USING btree ( keyword, id );
CREATE INDEX ezkeyword_attr_link_kid_oaid ON ezkeyword_attribute_link USING btree ( keyword_id, objectattribute_id );

CREATE INDEX ezurlalias_is_wildcard ON ezurlalias USING btree ( is_wildcard );

CREATE INDEX eznode_assignment_coid_cov ON eznode_assignment USING btree ( contentobject_id,contentobject_version );
CREATE INDEX eznode_assignment_is_main ON eznode_assignment USING btree ( is_main );
CREATE INDEX eznode_assignment_parent_node ON eznode_assignment USING btree ( parent_node );
