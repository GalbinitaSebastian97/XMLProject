<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>List hyperlink-uri</title>
            </head>
            <body>
                <xsl:apply-templates select="list"/>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="lis">
        <UL><xsl:apply-templates/></UL>
    </xsl:template>
    
    <xsl:template match="list/listitem">
        <li><xsl:apply-templates/></li>
    </xsl:template>
    
    <xsl:template match="hyperlink">
        <A href="{url}" target="{target}">
            <xsl:value-of select="name"/>
        </A>
    </xsl:template>
</xsl:stylesheet>
