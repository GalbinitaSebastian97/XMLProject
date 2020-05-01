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
                <div class="container">
                <div class="container mt-5 pt-5">
                    <xsl:for-each select="root/date[id=$id]">
                        <div class="text-center">
                            <h2 class="text-center display-4 "><xsl:value-of select="title"/></h2>
                            <br></br>
                            <img src="{image}" style="width:1100px;height:500px"/>
                        </div>
                        <br></br>
                        <h4><xsl:value-of select="overview"/></h4>
                        </xsl:for-each>
                        <xsl:element name="a">
                        <xsl:attribute name="href">
                            <xsl:value-of select="root/date/back"/>
                        </xsl:attribute>
                        <span >Go back</span>
                        </xsl:element>
                    
                 </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
