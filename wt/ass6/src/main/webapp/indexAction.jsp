<%@page import="java.sql.*"%>
<%
String userid = request.getParameter("userid");
String password = request.getParameter("password");
try{
	Class.forName("com.mysql.jdbc.Driver");
	Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/ass6","root","");
	Statement st=con.createStatement();
	ResultSet resultset= st.executeQuery("select * from userdetails where username='"+userid+"' and password='"+password+"'");
	resultset.next();
	String username=resultset.getString("username");
	//out.println("success "+username);
	System.out.println(username + " has successfully logged in");
	response.sendRedirect("save.html");
}catch(Exception e){
	//out.println(e);
	System.out.println(e);
	response.sendRedirect("error.html");
}
%>