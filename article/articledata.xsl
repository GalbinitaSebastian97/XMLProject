<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Data</title>
                <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet"></link>
                <link href="css/blog.css" rel="stylesheet"></link>
                <link href="css/add-image.css" rel="stylesheet"></link>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></link>
            </head>
            <body>
                <div class="blog-post">
                    <xsl:for-each select="root/date">
                        <h2 class="blog-post-title"><xsl:value-of select="title"/></h2>
                            <br></br>
                        <td><img src="{image}" style="width:730px;height:300px"/></td>
                            <br></br><br></br>
                        <p><xsl:value-of select="overview"/></p>
                        <xsl:element name="a">
                            <xsl:attribute name="href">
                            <xsl:value-of select="view"/>
                            </xsl:attribute>
                            <span>View</span>
                        </xsl:element>
                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of select="edit"/>
                            </xsl:attribute>
                            <span>Edit</span>
                        </xsl:element>
                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of select="delete"/>
                            </xsl:attribute>
                            <xsl:attribute name="onclick">
                                <xsl:value-of select="confirm"/>
                            </xsl:attribute>
                            <span>Delete</span>
                        </xsl:element>
                    </xsl:for-each>
                    <br></br>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>