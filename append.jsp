<%@ page import="java.sql.*">
<%
String username=request.getParameter("UserName");
String username=request.getParameter("UserId");
String username=request.getParameter("Email");
try{
Class.forName("com.mysql.jdbc.Driver");
Connection conn=DriverManager.getConnection("jdbc:mysql://localhost:3306")
}
catch(Exception e)
{
out.println(e)
}
%>